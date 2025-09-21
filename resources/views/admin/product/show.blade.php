@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Detail Produk</h3>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Informasi Produk</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Produk</th>
                            <td>{{ $product->nama_produk }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $product->kategori }}</td>
                        </tr>
                        <tr>
                            <th>Bahan</th>
                            <td>{{ $product->bahan }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $product->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Pre-Order</th>
                            <td>
                                @if($product->pre_order)
                                    <span class="badge bg-success">YA</span>
                                @else
                                    <span class="badge bg-secondary">TIDAK</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Harga Umum</th>
                            <td>
                                @if($product->harga)
                                    Rp {{ number_format($product->harga,0,',','.') }}
                                @else
                                    <em>-</em>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Stok Umum</th>
                            <td>{{ $product->stok ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <h4>Foto Produk</h4>
                    <div class="row">
                        @forelse($product->photos as $photo)
                            <div class="col-md-6 mb-3">
                                <img src="{{ asset('storage/'.$photo->path_gambar) }}" alt="Foto Produk" class="img-fluid rounded">
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted">Tidak ada foto</p>
                            </div>
                        @endforelse
                    </div>
                    
                    <h4 class="mt-4">Panduan Ukuran</h4>
                    @if($product->panduan_ukuran)
                        <a href="{{ asset('storage/'.$product->panduan_ukuran) }}" target="_blank">
                            <img src="{{ asset('storage/'.$product->panduan_ukuran) }}" alt="Panduan Ukuran" class="img-fluid rounded">
                        </a>
                    @else
                        <p class="text-muted">Tidak ada panduan ukuran</p>
                    @endif
                </div>
            </div>
            
            <h4 class="mt-4">Ukuran dan Variasi</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Ukuran</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($product->sizes as $size)
                            <tr>
                                <td>{{ $size->nama_ukuran }}</td>
                                <td>{{ $size->stok ?? '-' }}</td>
                                <td>
                                    @if($size->harga)
                                        Rp {{ number_format($size->harga,0,',','.') }}
                                    @else
                                        <em>-</em>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada ukuran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit Produk</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus produk ini?')">
                        Hapus Produk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .bg-maroon {
        background-color: #800000;
    }
</style>