@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Tambah Produk</h3>

    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="Anak-anak">Anak-anak</option>
                <option value="Remaja">Remaja</option>
                <option value="Dewasa">Dewasa</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Umum</label>
            <input type="text" name="harga" class="form-control" placeholder="Contoh: 100000">
        </div>

        <div class="mb-3">
            <label>Stok Umum</label>
            <input type="text" name="stok" class="form-control" placeholder="Contoh: 50">
        </div>

        <div class="mb-3">
            <label>Bahan</label>
            <input type="text" name="bahan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Foto Produk (bisa pilih lebih dari 1)</label>
            <input type="file" name="photos[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Panduan Ukuran (gambar opsional)</label>
            <input type="file" name="panduan_ukuran" class="form-control">
        </div>

        <hr>
        <h5>Ukuran (Opsional)</h5>
        <div id="size-wrapper">
            <div class="size-item mb-3 border p-3 rounded">
                <label>Nama Ukuran</label>
                <input type="text" name="sizes[0][nama_ukuran]" class="form-control mb-2">

                <label>Stok</label>
                <input type="text" name="sizes[0][stok]" class="form-control mb-2">

                <label>Harga</label>
                <input type="text" name="sizes[0][harga]" class="form-control mb-2">
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addSize()">+ Tambah Ukuran</button>
        <hr>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
let sizeIndex = 1;
function addSize() {
    const wrapper = document.getElementById('size-wrapper');
    const item = document.createElement('div');
    item.classList.add('size-item','mb-3','border','p-3','rounded');
    item.innerHTML = `
        <label>Nama Ukuran</label>
        <input type="text" name="sizes[${sizeIndex}][nama_ukuran]" class="form-control mb-2">

        <label>Stok</label>
        <input type="text" name="sizes[${sizeIndex}][stok]" class="form-control mb-2">

        <label>Harga</label>
        <input type="text" name="sizes[${sizeIndex}][harga]" class="form-control mb-2">

        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="this.parentElement.remove()">Hapus Ukuran</button>
    `;
    wrapper.appendChild(item);
    sizeIndex++;
}
</script>
@endsection
