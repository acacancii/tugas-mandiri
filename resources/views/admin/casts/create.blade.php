@extends('admin.layout')

@section('title', 'Tambah Cast')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-plus-circle"></i> Tambah Cast Baru</h2>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.casts.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-8">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Nama Cast <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" maxlength="45" placeholder="Contoh: Reza Rahadian" required>
                @error('name') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @error('age') has-error @enderror">
                <label for="age">Umur <span class="text-danger">*</span></label>
                <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" min="1" max="150" placeholder="Contoh: 35" required>
                @error('age') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group @error('bio') has-error @enderror">
        <label for="bio">Biografi <span class="text-danger">*</span></label>
        <textarea name="bio" id="bio" rows="5" class="form-control" placeholder="Tuliskan biografi singkat pemeran..." required>{{ old('bio') }}</textarea>
        @error('bio') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Cast
    </button>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
