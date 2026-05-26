<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'media_type',
        'media_path',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Returns an embeddable iframe URL for YouTube/Vimeo links.
     */
    public function getEmbedUrl(): ?string
    {
        $url = $this->media_path;
        if (!$url || $this->media_type !== 'video') return null;

        // YouTube
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // Vimeo
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $m)) {
            return 'https://player.vimeo.com/video/' . $m[1];
        }

        return null;
    }
}
