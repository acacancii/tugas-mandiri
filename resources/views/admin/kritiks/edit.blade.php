@extends('admin.layout')

@section('title', 'Edit Komentar')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-pencil-square-o"></i> Edit Komentar</h2>
    <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.kritiks.update', $kritik->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pengguna (Read-only)</label>
                <input type="text" class="form-control" value="{{ $kritik->user->name ?? 'User terhapus' }} ({{ $kritik->user->email ?? '-' }})" readonly disabled>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Judul Film (Read-only)</label>
                <input type="text" class="form-control" value="{{ $kritik->film->title ?? 'Film terhapus' }}" readonly disabled>
            </div>
        </div>
    </div>

    <div class="form-group @error('rating') has-error @enderror">
        <label for="rating">Rating (1 - 5 Bintang) <span class="text-danger">*</span></label>
        <select name="rating" id="rating" class="form-control" style="max-width: 200px;" required>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ old('rating', $kritik->rating) == $i ? 'selected' : '' }}>
                    {{ $i }} Bintang @if($i == 5) (Sangat Bagus) @elseif($i == 1) (Sangat Buruk) @endif
                </option>
            @endfor
        </select>
        @error('rating') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="form-group @error('comment') has-error @enderror">
        <label for="comment">Isi Komentar / Ulasan <span class="text-danger">*</span></label>
        <textarea name="comment" id="comment" rows="5" class="form-control" maxlength="500" placeholder="Tuliskan ulasan..." required>{{ old('comment', $kritik->comment) }}</textarea>
        <p class="help-block">Maksimal 500 karakter.</p>
        @error('comment') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <hr>
    <button type="submit" class="btn btn-warning">
        <i class="fa fa-save"></i> Perbarui Komentar
    </button>
    <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
