@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Daftar Produk</h3>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga Umum</th>
                <th>Stok Umum</th>
                <th>Bahan</th>
                <th>Deskripsi</th>
                <th>Ukuran</th>
                <th>Foto Produk</th>
                <th>Panduan Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($produk as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->kategori }}</td>
                <td>
                    @if($p->harga)
                        Rp {{ number_format($p->harga,0,',','.') }}
                    @else
                        <em>-</em>
                    @endif
                </td>
                <td>{{ $p->stok ?? '-' }}</td>
                <td>{{ $p->bahan }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>
                    @forelse($p->sizes as $s)
                        <strong>{{ $s->nama_ukuran }}</strong><br>
                        Stok: {{ $s->stok }}<br>
                        Harga: Rp {{ number_format($s->harga,0,',','.') }}<br>
                        <hr>
                    @empty
                        <em>Tidak ada ukuran</em>
                    @endforelse
                </td>
                <td>
                    @forelse($p->photos as $photo)
                        <img src="{{ asset('storage/'.$photo->path_gambar) }}" alt="Foto Produk" width="80" class="mb-2 rounded">
                    @empty
                        <em>Tidak ada foto</em>
                    @endforelse
                </td>
                <td>
                    @if($p->panduan_ukuran)
                        <a href="{{ asset('storage/'.$p->panduan_ukuran) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                    @else
                        <em>-</em>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.product.destroy',$p->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="text-center">Belum ada produk</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
