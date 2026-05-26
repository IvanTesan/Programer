<x-layouts.layout>
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
<style>
    .ql-toolbar.ql-snow { background:#1f2937; border-color:#374151!important; border-radius:.5rem .5rem 0 0; }
    .ql-toolbar.ql-snow .ql-stroke{stroke:#9ca3af} .ql-toolbar.ql-snow .ql-fill{fill:#9ca3af}
    .ql-toolbar.ql-snow .ql-picker-label{color:#9ca3af}
    .ql-toolbar.ql-snow button:hover .ql-stroke,.ql-toolbar.ql-snow .ql-active .ql-stroke{stroke:#60a5fa}
    .ql-toolbar.ql-snow button:hover .ql-fill,.ql-toolbar.ql-snow .ql-active .ql-fill{fill:#60a5fa}
    .ql-container.ql-snow{background:#111827;border-color:#374151!important;border-radius:0 0 .5rem .5rem;min-height:160px}
    .ql-editor{color:#e5e7eb;font-size:.95rem;line-height:1.7;min-height:140px}
    .ql-editor.ql-blank::before{color:#6b7280;font-style:normal}
    .ql-snow .ql-picker-options{background:#1f2937;border-color:#374151}
    .ql-snow .ql-picker-item{color:#d1d5db}
    .section-block { background:#111827; border:1px solid #374151; border-radius:.75rem; padding:1.25rem; margin-bottom:1rem; position:relative; }
    .section-block:hover .del-btn { opacity:1; }
    .del-btn { opacity:0; transition:opacity .2s; }
</style>

<div class="max-w-4xl mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <h1 class="text-4xl font-extrabold text-blue-500" style="text-shadow:0 0 10px #0056ff">Editar Curso</h1>
        <a href="{{ route('products.show', $course->id) }}" class="btn btn-ghost btn-sm">← Volver al curso</a>
    </div>

    @if($errors->any())
    <div class="alert alert-error mb-6">
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success mb-6">{{ session('success') }}</div>
    @endif

    <form id="courseForm" action="{{ route('products.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ══════════════════════════════════════════════════ --}}
        {{-- BLOQUE 1: INFORMACIÓN BÁSICA                       --}}
        {{-- ══════════════════════════════════════════════════ --}}
        <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 mb-6 shadow-xl">
            <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <span class="w-7 h-7 rounded-full bg-blue-500 text-white text-sm font-bold flex items-center justify-center">1</span>
                Información del Curso
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="form-control">
                    <label class="label"><span class="label-text text-gray-300 font-semibold">Título *</span></label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" placeholder="Ej: Python Máster"
                        class="input input-bordered bg-gray-900 text-white focus:border-blue-500 w-full @error('title') border-error @enderror" required />
                    @error('title')<span class="text-red-400 text-sm mt-1">{{ $message }}</span>@enderror
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text text-gray-300 font-semibold">Etiqueta *</span></label>
                    <input type="text" name="tag" value="{{ old('tag', $course->tag) }}" placeholder="Ej: PYTHON"
                        class="input input-bordered bg-gray-900 text-white focus:border-blue-500 w-full @error('tag') border-error @enderror" required />
                    @error('tag')<span class="text-red-400 text-sm mt-1">{{ $message }}</span>@enderror
                </div>

                <div class="form-control md:col-span-2">
                    <label class="label"><span class="label-text text-gray-300 font-semibold">Descripción breve *</span></label>
                    <textarea name="description" rows="3" placeholder="Describe el curso brevemente..."
                        class="textarea textarea-bordered bg-gray-900 text-white focus:border-blue-500 w-full @error('description') border-error @enderror"
                        required>{{ old('description', $course->description) }}</textarea>
                    @error('description')<span class="text-red-400 text-sm mt-1">{{ $message }}</span>@enderror
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text text-gray-300 font-semibold">Nivel *</span></label>
                    <select name="level" class="select select-bordered bg-gray-900 text-white w-full">
                        <option value="Básico"     {{ old('level', $course->level) == 'Básico'     ? 'selected' : '' }}>Básico</option>
                        <option value="Intermedio" {{ old('level', $course->level) == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                        <option value="Avanzado"   {{ old('level', $course->level) == 'Avanzado'   ? 'selected' : '' }}>Avanzado</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text text-gray-300 font-semibold">Color de Fondo (Gradiente) *</span></label>
                    <select name="gradient" class="select select-bordered bg-gray-900 text-white w-full">
                        @php
                            $currentGradient = old('gradient', $course->gradient);
                            $knownGradients = [
                                'from-blue-500 to-indigo-600' => 'Azul',
                                'from-emerald-500 to-teal-600' => 'Verde',
                                'from-pink-500 to-rose-600' => 'Rojo',
                                'from-purple-500 to-indigo-600' => 'Morado',
                                'from-orange-500 to-red-600' => 'Naranja',
                                'from-amber-500 to-orange-600' => 'Amarillo',
                            ];
                        @endphp
                        @foreach($knownGradients as $value => $label)
                            <option value="{{ $value }}" {{ $currentGradient == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                        @if(!array_key_exists($currentGradient, $knownGradients))
                            <option value="{{ $currentGradient }}" selected>{{ $currentGradient }} (Personalizado)</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════════════ --}}
        {{-- BLOQUE 2: TEORÍA                                   --}}
        {{-- ══════════════════════════════════════════════════ --}}
        <div class="bg-gray-800 border border-gray-700 rounded-2xl p-8 mb-6 shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-7 h-7 rounded-full bg-blue-500 text-white text-sm font-bold flex items-center justify-center">2</span>
                    Teoría del Curso <span class="text-gray-400 text-xs font-normal ml-2">(Mínimo 1 sección requerida *)</span>
                </h2>
                <button type="button" id="addSectionBtn"
                    class="btn btn-sm border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white btn-outline gap-1">
                    + Añadir sección
                </button>
            </div>

            <div id="sectionsContainer"></div>
            <p id="noSectionsMsg" class="text-gray-500 text-center py-6 italic text-sm" style="display: none">
                Sin secciones aún. Pulsa "+ Añadir sección" para comenzar.
            </p>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('products.show', $course->id) }}" class="btn btn-outline border-gray-600 text-gray-400 hover:bg-gray-800">
                Cancelar
            </a>
            <button type="submit" class="btn btn-warning btn-lg px-14 text-base shadow-lg shadow-yellow-500/10">
                Guardar Cambios
            </button>
        </div>

    </form>
</div>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
const quillToolbar = [
    [{ header: [1,2,3,false] }],
    ['bold','italic','underline','strike'],
    [{ color:[] },{ background:[] }],
    [{ list:'ordered' },{ list:'bullet' }],
    ['blockquote','code-block'],
    ['link'],['clean']
];

let sectionIndex = 0;
const editors = {};

function addSection(title='', content='', mediaType='none', mediaPath='') {
    const container = document.getElementById('sectionsContainer');
    document.getElementById('noSectionsMsg').style.display = 'none';

    const idx = sectionIndex++;
    const wrap = document.createElement('div');
    wrap.className = 'section-block';
    wrap.dataset.idx = idx;
    wrap.innerHTML = `
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:.75rem">
            <span class="text-blue-400 font-bold text-xs uppercase tracking-widest sec-num">Sección ${container.children.length+1}</span>
            <button type="button" class="del-btn btn btn-xs btn-error btn-circle" onclick="delSection(this)">✕</button>
        </div>
        <input type="hidden" name="sections[${idx}][title]" class="title-hidden" value="${esc(title)}">
        <input type="hidden" name="sections[${idx}][content]" class="content-hidden">
        <input type="text" class="title-text input input-bordered bg-gray-800 text-white w-full mb-3"
            placeholder="Título de la sección" value="${esc(title)}"
            oninput="this.previousElementSibling.previousElementSibling.value=this.value" required>
        <div id="qe-${idx}" class="quill-box mb-3"></div>

        <div class="mt-4 border-t border-gray-700 pt-3">
            <div class="form-control w-full max-w-xs mb-3">
                <label class="label"><span class="label-text text-gray-400 font-semibold text-xs">Recurso adicional después de la sección</span></label>
                <select name="sections[${idx}][media_type]" class="select select-bordered select-sm bg-gray-800 text-white w-full max-w-xs" onchange="toggleSectionMedia(${idx}, this.value)">
                    <option value="none" ${mediaType === 'none' || !mediaType ? 'selected' : ''}>Ninguno</option>
                    <option value="image" ${mediaType === 'image' ? 'selected' : ''}>Imagen</option>
                    <option value="video" ${mediaType === 'video' ? 'selected' : ''}>Vídeo</option>
                </select>
            </div>
            
            <div class="media-image-wrap ${mediaType === 'image' ? '' : 'hidden'}" id="media-image-wrap-${idx}">
                <div class="image-preview-box mb-2 ${mediaPath && mediaType === 'image' ? '' : 'hidden'}">
                    <img src="${mediaPath && mediaType === 'image' ? '/storage/' + mediaPath : '#'}" class="w-32 h-auto object-cover rounded-lg border border-gray-750 mb-2" id="media-image-preview-${idx}">
                    <input type="hidden" name="sections[${idx}][existing_media_path]" value="${mediaType === 'image' ? mediaPath : ''}">
                </div>
                <input type="file" name="sections[${idx}][image]" accept="image/*" class="file-input file-input-bordered file-input-sm bg-gray-800 text-white w-full max-w-md" onchange="previewSectionImage(this, ${idx})">
            </div>

            <div class="media-video-wrap ${mediaType === 'video' ? '' : 'hidden'}" id="media-video-wrap-${idx}">
                <input type="text" name="sections[${idx}][video_url]" value="${mediaType === 'video' ? esc(mediaPath) : ''}"
                    placeholder="URL del vídeo (YouTube o Vimeo, ej: https://youtube.com/...)"
                    class="input input-bordered input-sm bg-gray-800 text-white w-full max-w-md">
            </div>
        </div>
    `;
    container.appendChild(wrap);
    renumber();

    const q = new Quill(`#qe-${idx}`, {
        theme:'snow', modules:{toolbar:quillToolbar},
        placeholder:'Escribe aquí el contenido teórico...'
    });
    if(content) q.clipboard.dangerouslyPasteHTML(content);
    editors[idx] = { q, wrap };
}

function toggleSectionMedia(idx, value) {
    const wrap = document.getElementById(`media-image-wrap-${idx}`);
    const vWrap = document.getElementById(`media-video-wrap-${idx}`);
    if (value === 'image') {
        wrap.classList.remove('hidden');
        vWrap.classList.add('hidden');
    } else if (value === 'video') {
        wrap.classList.add('hidden');
        vWrap.classList.remove('hidden');
    } else {
        wrap.classList.add('hidden');
        vWrap.classList.add('hidden');
    }
}

function previewSectionImage(input, idx) {
    const preview = document.getElementById(`media-image-preview-${idx}`);
    const previewBox = preview.parentElement;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewBox.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        const existing = input.previousElementSibling ? input.previousElementSibling.querySelector('input[type="hidden"]') : null;
        if (!existing || !existing.value) {
            previewBox.classList.add('hidden');
        }
    }
}

function delSection(btn) {
    const container = document.getElementById('sectionsContainer');
    if (container.children.length <= 1) {
        alert('Un curso debe tener al menos una sección de teoría.');
        return;
    }
    const w = btn.closest('.section-block');
    delete editors[w.dataset.idx];
    w.remove(); renumber();
}

function renumber() {
    document.querySelectorAll('.sec-num').forEach((el,i) => el.textContent = `Sección ${i+1}`);
}

document.getElementById('addSectionBtn').onclick = () => addSection();

document.getElementById('courseForm').addEventListener('submit', (e) => {
    let activeEditors = Object.values(editors);
    if (activeEditors.length === 0) {
        e.preventDefault();
        alert('Un curso debe tener al menos una sección de teoría.');
        return;
    }
    
    activeEditors.forEach(({q,wrap}) => {
        wrap.querySelector('.title-hidden').value = wrap.querySelector('.title-text').value;
        wrap.querySelector('.content-hidden').value = q.root.innerHTML;
    });
});

function esc(s){ return String(s??'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }

@if(old('sections'))
    @foreach(old('sections') as $i=>$s)
        addSection(
            @json($s['title']??''),
            @json($s['content']??''),
            @json($s['media_type']??'none'),
            @json($s['media_type'] == 'video' ? ($s['video_url']??'') : ($s['existing_media_path']??''))
        );
    @endforeach
@else
    @foreach($course->sections as $section)
        addSection(@json($section->title), @json($section->content), @json($section->media_type), @json($section->media_path));
    @endforeach
@endif
</script>
</x-layouts.layout>
