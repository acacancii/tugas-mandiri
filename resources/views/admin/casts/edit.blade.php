@extends('admin.layout')

@section('title', 'Edit Cast')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-pencil-square-o"></i> Edit Data Cast: {{ $cast->name }}</h2>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.casts.update', $cast->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-8">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Nama Cast <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cast->name) }}" maxlength="45" required>
                @error('name') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group @error('age') has-error @enderror">
                <label for="age">Umur <span class="text-danger">*</span></label>
                <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $cast->age) }}" min="1" max="150" required>
                @error('age') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group @error('bio') has-error @enderror">
        <label for="bio">Biografi <span class="text-danger">*</span></label>
        <textarea name="bio" id="bio" rows="5" class="form-control" required>{{ old('bio', $cast->bio) }}</textarea>
        @error('bio') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-warning">
        <i class="fa fa-save"></i> Perbarui Cast
    </button>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
