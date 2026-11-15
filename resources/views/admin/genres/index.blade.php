@extends('admin.layout')

@section('title', 'Data Genre')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-tags"></i> Kelola Data Genre</h2>
    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Genre Baru
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th>Nama Genre</th>
                <th style="width: 150px;" class="text-center">Jumlah Film</th>
                <th style="width: 180px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $index => $genre)
                <tr>
                    <td class="text-center">{{ $genres->firstItem() + $index }}</td>
                    <td><strong>{{ $genre->name }}</strong></td>
                    <td class="text-center">
                        <span class="badge">{{ $genre->films_count ?? 0 }} film</span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus genre ini?');">
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
                    <td colspan="4" class="text-center text-muted" style="padding: 30px;">Belum ada data genre.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $genres->links() }}
</div>
@endsection
