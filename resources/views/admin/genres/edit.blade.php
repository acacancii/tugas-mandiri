@extends('admin.layout')

@section('title', 'Edit Genre')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-pencil-square-o"></i> Edit Data Genre: {{ $genre->name }}</h2>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Nama Genre <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
        @error('name') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-warning">
        <i class="fa fa-save"></i> Perbarui Genre
    </button>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
