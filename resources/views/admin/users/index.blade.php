@extends('admin.layout')

@section('title', 'Data User')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-user"></i> Kelola Data User</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah User Baru
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th style="width: 140px;" class="text-center">Role</th>
                <th style="width: 180px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td class="text-center">{{ $users->firstItem() + $index }}</td>
                    <td>
                        <strong>{{ $user->name }}</strong>
                        @if ($user->id === Auth::id())
                            <span class="label label-success" style="margin-left: 5px;">Akun Anda</span>
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @if ($user->role_id == 2)
                            <span class="label badge-role-admin">Administrator</span>
                        @else
                            <span class="label badge-role-user">User Biasa</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        @if ($user->id !== Auth::id())
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini? Profil dan seluruh komentarnya juga akan dihapus.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        @else
                            <button class="btn btn-sm btn-default" disabled title="Anda tidak dapat menghapus akun Anda sendiri">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $users->links() }}
</div>
@endsection
