@extends('admin.layout')

@section('title', 'Edit Film')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-pencil-square-o"></i> Edit Data Film: {{ $film->title }}</h2>
    <a href="{{ route('admin.films.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group @error('title') has-error @enderror">
        <label for="title">Judul Film <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $film->title) }}" required>
        @error('title') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('genre_id') has-error @enderror">
                <label for="genre_id">Genre <span class="text-danger">*</span></label>
                <select name="genre_id" id="genre_id" class="form-control" required>
                    <option value="">-- Pilih Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('year') has-error @enderror">
                <label for="year">Tahun Rilis <span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $film->year) }}" min="1900" max="2100" required>
                @error('year') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group @error('sinopsis') has-error @enderror">
        <label for="sinopsis">Sinopsis <span class="text-danger">*</span></label>
        <textarea name="sinopsis" id="sinopsis" rows="5" class="form-control" required>{{ old('sinopsis', $film->sinopsis) }}</textarea>
        @error('sinopsis') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="form-group @error('poster') has-error @enderror">
        <label for="poster">Poster Film</label>
        @if ($film->poster)
            <div style="margin-bottom: 10px;">
                <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="width: 100px; height: 140px; object-fit: cover; border-radius: 4px; border: 1px solid #ccc;">
                <p class="text-muted" style="margin-top: 5px; font-size: 12px;">Poster saat ini (biarkan kosong jika tidak ingin mengubah poster).</p>
            </div>
        @endif
        <input type="file" name="poster" id="poster" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
        <p class="help-block">Format: JPG, JPEG, PNG, WEBP. Maksimal ukuran: 2MB.</p>
        @error('poster') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-warning">
        <i class="fa fa-save"></i> Perbarui Film
    </button>
    <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
