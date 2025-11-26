@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h3 class="mb-4 text-danger">Daftar Buku Stok Menipis</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $item)
            <tr class="table-danger">
                <td>{{ $item->judul }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-primary btn-sm">Tambah Stok</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada buku stok menipis</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $buku->links() }}
</div>
@endsection
