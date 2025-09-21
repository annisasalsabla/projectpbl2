@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Produk</h3>

    <form action="{{ route('admin.product.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="Anak-anak" {{ $produk->kategori=='Anak-anak'?'selected':'' }}>Anak-anak</option>
                <option value="Remaja" {{ $produk->kategori=='Remaja'?'selected':'' }}>Remaja</option>
                <option value="Dewasa" {{ $produk->kategori=='Dewasa'?'selected':'' }}>Dewasa</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Umum</label>
            <input type="text" id="harga" name="harga" value="{{ number_format($produk->harga, 0, ',', '.') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok Umum</label>
            <input type="text" id="stok" name="stok" value="{{ number_format($produk->stok, 0, ',', '.') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Bahan</label>
            <input type="text" name="bahan" value="{{ $produk->bahan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto Produk Baru (opsional, bisa pilih lebih dari 1)</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Foto Produk Saat Ini</label><br>
            @foreach($produk->photos as $photo)
                <img src="{{ asset('storage/'.$photo->path_gambar) }}" alt="Foto" width="80" class="me-2 mb-2 rounded">
            @endforeach
        </div>

        <div class="mb-3">
            <label>Panduan Ukuran (gambar opsional)</label>
            <input type="file" name="panduan_ukuran" class="form-control">
            @if($produk->panduan_ukuran)
                <a href="{{ asset('storage/'.$produk->panduan_ukuran) }}" target="_blank">Lihat Panduan Lama</a>
            @endif
        </div>

        <hr>
        <h5>Ukuran (Opsional)</h5>
        <div id="size-wrapper">
            @foreach($produk->sizes as $i => $s)
            <div class="size-item mb-3 border p-3 rounded">
                <label>Nama Ukuran</label>
                <input type="text" name="sizes[{{ $i }}][nama_ukuran]" value="{{ $s->nama_ukuran }}" class="form-control mb-2">

                <label>Stok</label>
                <input type="text" name="sizes[{{ $i }}][stok]" value="{{ number_format($s->stok, 0, ',', '.') }}" class="form-control mb-2">

                <label>Harga</label>
                <input type="text" name="sizes[{{ $i }}][harga]" value="{{ number_format($s->harga, 0, ',', '.') }}" class="form-control mb-2">
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary" onclick="addSize()">+ Tambah Ukuran Baru</button>
        <hr>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
function formatNumber(input) {
    let value = input.value.replace(/\D/g, ""); // hanya angka
    if (value) {
        input.value = new Intl.NumberFormat('id-ID').format(value);
    } else {
        input.value = "";
    }
}

// format saat mengetik
document.getElementById('harga').addEventListener('input', function() {
    formatNumber(this);
});
document.getElementById('stok').addEventListener('input', function() {
    formatNumber(this);
});

// sebelum submit -> hilangkan titik biar masuk DB murni angka
document.querySelector('form').addEventListener('submit', function() {
    document.getElementById('harga').value = document.getElementById('harga').value.replace(/\D/g,'');
    document.getElementById('stok').value = document.getElementById('stok').value.replace(/\D/g,'');
});
</script>
@endsection
