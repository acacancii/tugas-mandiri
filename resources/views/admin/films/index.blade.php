@extends('admin.layout')

@section('title', 'Data Film')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-video-camera"></i> Kelola Data Film</h2>
    <a href="{{ route('admin.films.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Film Baru
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th style="width: 90px;" class="text-center">Poster</th>
                <th>Judul Film</th>
                <th style="width: 140px;">Genre</th>
                <th style="width: 90px;" class="text-center">Tahun</th>
                <th>Sinopsis</th>
                <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($films as $index => $film)
                <tr>
                    <td class="text-center">{{ $films->firstItem() + $index }}</td>
                    <td class="text-center">
                        @if ($film->poster)
                            <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="width: 60px; height: 85px; object-fit: cover; border-radius: 3px; border: 1px solid #ccc;">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td><strong>{{ $film->title }}</strong></td>
                    <td><span class="label label-info">{{ $film->genre->name ?? '-' }}</span></td>
                    <td class="text-center">{{ $film->year }}</td>
                    <td>{{ Str::limit($film->sinopsis, 100) }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.films.edit', $film->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.films.destroy', $film->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus film ini? Semua peran dan kritik terkait juga akan dihapus.');">
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
                    <td colspan="7" class="text-center text-muted" style="padding: 30px;">Belum ada data film.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $films->links() }}
</div>
@endsection
