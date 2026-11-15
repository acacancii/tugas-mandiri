@extends('admin.layout')

@section('title', 'Data Cast')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-users"></i> Kelola Data Cast / Pemeran</h2>
    <a href="{{ route('admin.casts.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Cast Baru
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th style="width: 220px;">Nama</th>
                <th style="width: 100px;" class="text-center">Umur</th>
                <th>Bio</th>
                <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($casts as $index => $cast)
                <tr>
                    <td class="text-center">{{ $casts->firstItem() + $index }}</td>
                    <td><strong>{{ $cast->name }}</strong></td>
                    <td class="text-center">{{ $cast->age }} th</td>
                    <td>{{ Str::limit($cast->bio, 120) }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.casts.edit', $cast->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.casts.destroy', $cast->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus cast ini? Semua data peran terkait juga akan dihapus.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data cast.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $casts->links() }}
</div>
@endsection
