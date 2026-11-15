@extends('admin.layout')

@section('title', 'Tambah User')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-user-plus"></i> Tambah User Baru</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: John Doe" required>
        @error('name') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="form-group @error('email') has-error @enderror">
        <label for="email">Alamat Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Contoh: user@example.com" required>
        @error('email') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('password') has-error @enderror">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 8 karakter" required>
                <p class="help-block">Minimal 8 karakter.</p>
                @error('password') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('role_id') has-error @enderror">
                <label for="role_id">Role Pengguna <span class="text-danger">*</span></label>
                <select name="role_id" id="role_id" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id', 1) == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }} @if($role->id == 2) (Akses Admin) @endif
                        </option>
                    @endforeach
                </select>
                @error('role_id') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <p class="text-muted"><i class="fa fa-info-circle"></i> Catatan: User yang dibuat otomatis akan memiliki data Profile default.</p>

    <hr>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan User
    </button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
