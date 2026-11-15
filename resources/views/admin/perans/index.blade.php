@extends('admin.layout')

@section('title', 'Data Peran')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-id-badge"></i> Kelola Data Peran Film</h2>
    <a href="{{ route('admin.perans.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Peran Baru
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th>Nama Karakter (Actor)</th>
                <th>Judul Film</th>
                <th>Nama Pemeran (Cast)</th>
                <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($perans as $index => $peran)
                <tr>
                    <td class="text-center">{{ $perans->firstItem() + $index }}</td>
                    <td><strong>{{ $peran->actor }}</strong></td>
                    <td>
                        <span class="label label-primary">{{ $peran->film->title ?? '-' }}</span>
                    </td>
                    <td>
                        <i class="fa fa-user"></i> {{ $peran->cast->name ?? '-' }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.perans.edit', $peran->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.perans.destroy', $peran->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peran ini?');">
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
                    <td colspan="5" class="text-center text-muted" style="padding: 30px;">Belum ada data peran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $perans->links() }}
</div>
@endsection
