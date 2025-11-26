<h4>Keranjang Peminjaman</h4>

<table class="table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($buku as $item)
        <tr>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <form action="{{ route('keranjang.remove', $item->id) }}" method="post">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">Keranjang kosong</td>
        </tr>
    @endforelse
    </tbody>
</table>

@if(count($buku) > 0)
<form action="{{ route('peminjaman.checkout') }}" method="post">
    @csrf
    <select name="siswa_id" class="form-control" required>
        @foreach($siswa as $s)
            <option value="{{ $s->id }}">{{ $s->nama }}</option>
        @endforeach
    </select>

    <button class="btn btn-primary mt-3">Checkout</button>
</form>
@endif
