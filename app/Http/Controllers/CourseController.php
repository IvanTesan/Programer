<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseFile;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('products.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'level'       => 'required|in:Básico,Intermedio,Avanzado',
            'gradient'    => 'required|string|max:255',
            'tag'         => 'required|string|max:100',

            // Sections (Mandatory)
            'sections'              => 'required|array|min:1',
            'sections.*.title'   => 'required|string|max:255',
            'sections.*.content' => 'required|string',
            'sections.*.media_type' => 'nullable|string|in:none,image,video',
            'sections.*.image'      => 'nullable|file|image|max:10240',
            'sections.*.video_url'  => 'nullable|string|max:255',
        ]);

        // Create the course
        $course = Course::create($request->only(['title', 'description', 'level', 'gradient', 'tag']));

        // Save theory sections
        $this->saveSections($course, $request->input('sections', []));

        return redirect()->route('products.index')->with('success', 'Curso creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with(['sections', 'pdfs', 'images', 'videos'])->findOrFail($id);
        return view('products.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with(['sections', 'pdfs', 'images', 'videos'])->findOrFail($id);
        return view('products.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::with(['sections', 'files'])->findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'level'       => 'required|in:Básico,Intermedio,Avanzado',
            'gradient'    => 'required|string|max:255',
            'tag'         => 'required|string|max:100',

            // Sections (Mandatory)
            'sections'              => 'required|array|min:1',
            'sections.*.title'   => 'required|string|max:255',
            'sections.*.content' => 'required|string',
            'sections.*.media_type' => 'nullable|string|in:none,image,video',
            'sections.*.image'      => 'nullable|file|image|max:10240',
            'sections.*.video_url'  => 'nullable|string|max:255',
        ]);

        $course->update($request->only(['title', 'description', 'level', 'gradient', 'tag']));

        // Replace sections
        $course->sections()->delete();
        $this->saveSections($course, $request->input('sections', []));

        // Clean up unused/removed section images from disk
        $activeImages = $course->sections()
            ->where('media_type', 'image')
            ->whereNotNull('media_path')
            ->pluck('media_path')
            ->toArray();

        $allSectionFiles = Storage::disk('public')->files("courses/{$course->id}/sections");
        foreach ($allSectionFiles as $file) {
            if (!in_array($file, $activeImages)) {
                Storage::disk('public')->delete($file);
            }
        }

        return redirect()->route('products.show', $course->id)->with('success', 'Curso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::with('files')->findOrFail($id);

        // Delete physical files
        foreach ($course->files as $file) {
            if ($file->type !== 'video_url') {
                Storage::disk('public')->delete($file->path);
            }
        }

        // Also remove the course folder if it exists
        Storage::disk('public')->deleteDirectory('courses/' . $course->id);

        $course->delete();

        return redirect()->route('products.index')->with('success', 'Curso eliminado');
    }

    /**
     * Delete a single file attachment (AJAX or form POST).
     */
    public function destroyFile(string $courseId, string $fileId)
    {
        $file = CourseFile::where('id', $fileId)->where('course_id', $courseId)->firstOrFail();

        if ($file->type !== 'video_url') {
            Storage::disk('public')->delete($file->path);
        }
        $file->delete();

        return back()->with('success', 'Archivo eliminado');
    }

    // ─────────────────────────────────────────────────────────────────────────

    private function saveSections(Course $course, array $sections): void
    {
        foreach ($sections as $index => $sectionData) {
            if (empty($sectionData['title']) && empty($sectionData['content'])) {
                continue;
            }

            $mediaType = $sectionData['media_type'] ?? null;
            $mediaPath = null;

            if ($mediaType === 'image') {
                $file = null;
                if (request()->hasFile("sections.{$index}.image")) {
                    $file = request()->file("sections.{$index}.image");
                } elseif (isset(request()->file('sections')[$index]['image'])) {
                    $file = request()->file('sections')[$index]['image'];
                }

                if ($file && $file->isValid()) {
                    $mediaPath = $file->store('courses/' . $course->id . '/sections', 'public');
                } else {
                    $mediaPath = $sectionData['existing_media_path'] ?? null;
                }
            } elseif ($mediaType === 'video') {
                $mediaPath = $sectionData['video_url'] ?? null;
            }

            CourseSection::create([
                'course_id'  => $course->id,
                'title'      => $sectionData['title'] ?? '',
                'content'    => $sectionData['content'] ?? '',
                'media_type' => $mediaType === 'none' ? null : $mediaType,
                'media_path' => $mediaPath,
                'order'      => $index,
            ]);
        }
    }

    private function saveFiles(Course $course, Request $request): void
    {
        $order = $course->files()->max('order') ?? -1;

        // PDFs
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $pdf) {
                if (!$pdf || !$pdf->isValid()) continue;
                $path = $pdf->store('courses/' . $course->id . '/pdfs', 'public');
                CourseFile::create([
                    'course_id' => $course->id,
                    'type'      => 'pdf',
                    'label'     => $pdf->getClientOriginalName(),
                    'path'      => $path,
                    'order'     => ++$order,
                ]);
            }
        }

        // Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if (!$image || !$image->isValid()) continue;
                $path = $image->store('courses/' . $course->id . '/images', 'public');
                CourseFile::create([
                    'course_id' => $course->id,
                    'type'      => 'image',
                    'label'     => $image->getClientOriginalName(),
                    'path'      => $path,
                    'order'     => ++$order,
                ]);
            }
        }

        // Video URLs (YouTube / Vimeo)
        $videoUrls = $request->input('video_urls', []);
        foreach ($videoUrls as $video) {
            $url = trim($video['url'] ?? '');
            if (empty($url)) continue;
            CourseFile::create([
                'course_id' => $course->id,
                'type'      => 'video_url',
                'label'     => $video['label'] ?? null,
                'path'      => $url,
                'order'     => ++$order,
            ]);
        }
    }
}
