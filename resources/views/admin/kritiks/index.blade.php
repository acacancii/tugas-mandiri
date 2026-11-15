@extends('admin.layout')

@section('title', 'Data Komentar')

@section('content')
<div class="page-header-admin">
    <h2><i class="fa fa-comments"></i> Kelola Komentar & Ulasan Film</h2>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th style="width: 50px;" class="text-center">No</th>
                <th style="width: 160px;">User</th>
                <th style="width: 200px;">Judul Film</th>
                <th style="width: 100px;" class="text-center">Rating</th>
                <th>Isi Komentar</th>
                <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kritiks as $index => $kritik)
                <tr>
                    <td class="text-center">{{ $kritiks->firstItem() + $index }}</td>
                    <td>
                        <i class="fa fa-user-circle"></i> <strong>{{ $kritik->user->name ?? 'User terhapus' }}</strong>
                        <br><small class="text-muted">{{ $kritik->user->email ?? '' }}</small>
                    </td>
                    <td>
                        <span class="label label-primary">{{ $kritik->film->title ?? 'Film terhapus' }}</span>
                    </td>
                    <td class="text-center">
                        <span class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa {{ $i <= $kritik->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                            @endfor
                        </span>
                        <br><small>({{ $kritik->rating }} / 5)</small>
                    </td>
                    <td>{{ $kritik->comment }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.kritiks.edit', $kritik->id) }}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.kritiks.destroy', $kritik->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?');">
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
                    <td colspan="6" class="text-center text-muted" style="padding: 30px;">Belum ada komentar dari user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $kritiks->links() }}
</div>
@endsection
