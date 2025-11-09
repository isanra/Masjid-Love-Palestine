<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Postingan Baru</title>
    {{-- You might need CSRF token meta tag if using AJAX later --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- Basic Styling (Optional, can be removed) --}}
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="url"], select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }
        textarea { min-height: 150px; }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        .hidden { display: none; } /* Utility class */
    </style>
</head>
<body>

    <h1>Buat Postingan Baru</h1>

    {{-- Ensure the form points to the correct route --}}
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- CSRF Token --}}

        {{-- 1. Tipe Konten --}}
        <div class="form-group">
            <label for="type">Tipe Konten:</label>
            <select name="type" id="type" required onchange="toggleVideoUrl()">
                <option value="artikel" {{ old('type') == 'artikel' ? 'selected' : '' }}>Artikel</option>
                <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
            </select>
            {{-- Display validation errors if using Laravel validation --}}
            {{-- @error('type') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- 2. Judul --}}
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
            {{-- @error('judul') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- 3. Thumbnail (File Upload) --}}
        <div class="form-group">
            <label for="thumbnail">Thumbnail (Gambar):</label>
            <input type="file" name="thumbnail" id="thumbnail" accept="image/jpeg, image/png, image/jpg, image/webp">
            <small>Kosongkan jika ingin mengambil otomatis dari URL Video.</small><br/>
            {{-- @error('thumbnail') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- 4. Isi (Artikel/Deskripsi) --}}
        <div class="form-group">
            <label for="isi" id="isi_label">Isi Artikel:</label>
            <textarea name="isi" id="isi" required>{{ old('isi') }}</textarea>
            {{-- @error('isi') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- 5. URL Video (Conditional) --}}
        <div class="form-group hidden" id="video_url_field">
            <label for="video_url">URL Video (YouTube):</label>
            <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=...">
            {{-- @error('video_url') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- 6. Topik Utama (Tags) --}}
        <div class="form-group">
            <label for="topik_utama">Topik Utama / Tags:</label>
            <input type="text" name="topik_utama" id="topik_utama" value="{{ old('topik_utama') }}" placeholder="Contoh: Fiqih, Sejarah, Kajian" required>
            <small>Pisahkan dengan koma (,)</small><br/>
            {{-- @error('topik_utama') <div style="color: red;">{{ $message }}</div> @enderror --}}
        </div>

        {{-- Submit Button --}}
        <div class="form-group">
            <button type="submit">Publish Post</button>
        </div>

    </form>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        // Simple script to show/hide Video URL field
        function toggleVideoUrl() {
            const typeSelect = document.getElementById('type');
            const videoField = document.getElementById('video_url_field');
            const isiLabel = document.getElementById('isi_label');

            if (typeSelect.value === 'video') {
                videoField.classList.remove('hidden');
                isiLabel.innerText = 'Deskripsi Video:'; // Change label
            } else {
                videoField.classList.add('hidden');
                isiLabel.innerText = 'Isi Artikel:'; // Change label back
            }
        }
        // Run on page load in case of validation errors with old('type')
        document.addEventListener('DOMContentLoaded', toggleVideoUrl);
    </script>

</body>
</html>