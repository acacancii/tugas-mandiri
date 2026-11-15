@extends('admin.layout')

@section('title', 'Tambah Genre')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-plus-circle"></i> Tambah Genre Baru</h2>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.genres.store') }}" method="POST">
    @csrf

    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Nama Genre <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Action, Horor, Komedi" required>
        @error('name') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Genre
    </button>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
