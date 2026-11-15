@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-pencil-square-o"></i> Edit Data User: {{ $user->name }}</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>
</div>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        @error('name') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="form-group @error('email') has-error @enderror">
        <label for="email">Alamat Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        @error('email') <span class="help-block">{{ $message }}</span> @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group @error('password') has-error @enderror">
                <label for="password">Password Baru (Opsional)</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah password">
                <p class="help-block">Biarkan kosong jika password tidak diubah. Minimal 8 karakter jika diisi.</p>
                @error('password') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group @error('role_id') has-error @enderror">
                <label for="role_id">Role Pengguna <span class="text-danger">*</span></label>
                <select name="role_id" id="role_id" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }} @if($role->id == 2) (Akses Admin) @endif
                        </option>
                    @endforeach
                </select>
                @if ($user->id === Auth::id())
                    <p class="help-block text-warning"><i class="fa fa-warning"></i> Anda tidak boleh menurunkan role akun Anda sendiri dari Administrator.</p>
                @endif
                @error('role_id') <span class="help-block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <hr>
    <button type="submit" class="btn btn-warning">
        <i class="fa fa-save"></i> Perbarui User
    </button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
