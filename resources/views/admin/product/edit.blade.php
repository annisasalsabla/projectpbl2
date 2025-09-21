@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #4361ee;">Edit Produk</h2>
        <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terdapat masalah dengan inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.product.update', $produk->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf
        @method('PUT')
        
        <!-- Informasi Produk -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <i class="fas fa-info-circle me-2"></i>Informasi Produk
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        @error('nama_produk')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Anak-anak" {{ old('kategori', $produk->kategori) == 'Anak-anak' ? 'selected' : '' }}>Anak-anak</option>
                            <option value="Remaja" {{ old('kategori', $produk->kategori) == 'Remaja' ? 'selected' : '' }}>Remaja</option>
                            <option value="Dewasa" {{ old('kategori', $produk->kategori) == 'Dewasa' ? 'selected' : '' }}>Dewasa</option>
                        </select>
                        @error('kategori')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Harga Umum <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="harga_formatted" id="harga_formatted" class="form-control" placeholder="Masukkan harga umum" value="{{ number_format(old('harga', $produk->harga), 0, ',', '.') }}" required>
                            <input type="hidden" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}">
                        </div>
                        @error('harga')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label class="form-label">Stok Umum <span class="text-danger">*</span></label>
                        <input type="number" name="stok" class="form-control" placeholder="Masukkan stok umum" value="{{ old('stok', $produk->stok) }}" required>
                        @error('stok')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Bahan <span class="text-danger">*</span></label>
                    <input type="text" name="bahan" class="form-control" placeholder="Contoh: Katun, Polyester, dll." value="{{ old('bahan', $produk->bahan) }}" required>
                    @error('bahan')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan detail produk, keunggulan, dan informasi lainnya." required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="form-check form-switch me-2">
                        <input class="form-check-input" type="checkbox" name="pre_order" value="1" id="pre_order_toggle" {{ old('pre_order', $produk->pre_order) ? 'checked' : '' }}>
                        <label class="form-check-label" for="pre_order_toggle">Centang jika produk Pre-Order</label>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Foto Produk -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <i class="fas fa-images me-2"></i>Foto Produk
            </div>
            <div class="card-body">
                <p class="text-muted">Unggah satu atau beberapa foto produk (maksimal 5 foto)</p>
                
                <!-- Tampilkan foto yang sudah ada -->
                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label>
                    <div class="image-preview-container" id="existingPhotosPreview">
                        @if($produk->photos && count($produk->photos) > 0)
                            @foreach($produk->photos as $index => $photo)
                                <div class="image-preview" data-photo-id="{{ $photo->id }}">
                                    <img src="{{ asset('storage/' . $photo->path) }}" alt="Foto Produk {{ $index + 1 }}">
                                    <div class="remove-image" onclick="removeExistingPhoto(this, {{ $photo->id }})">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada foto produk</p>
                        @endif
                    </div>
                </div>
                
                <!-- Input untuk foto baru -->
                <div class="file-upload-area" id="productPhotosArea">
                    <input type="file" name="photos[]" id="productPhotos" class="d-none" multiple accept="image/*">
                    <div class="file-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h5>Klik untuk menambah gambar baru</h5>
                    <p class="text-muted">Format file: JPG, PNG, JPEG (Maksimal 2MB per file)</p>
                </div>
                
                <!-- Preview foto baru -->
                <div class="preview-container mt-3">
                    <div class="image-preview-container" id="productPhotosPreview"></div>
                </div>
                @error('photos')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                @error('photos.*')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                
                <!-- Input untuk foto yang akan dihapus -->
                <input type="hidden" name="deleted_photos" id="deletedPhotos" value="">
            </div>
        </div>
        
        <!-- Panduan Ukuran -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <i class="fas fa-ruler-combined me-2"></i>Panduan Ukuran
            </div>
            <div class="card-body">
                <p class="text-muted">Unggah gambar panduan ukuran (opsional)</p>
                
                <!-- Tampilkan panduan ukuran yang sudah ada -->
                <div class="mb-3">
                    <label class="form-label">Panduan Ukuran Saat Ini</label>
                    <div id="existingSizeGuidePreview">
                        @if($produk->panduan_ukuran)
                            <div class="image-preview">
                                <img src="{{ asset('storage/' . $produk->panduan_ukuran) }}" alt="Panduan Ukuran">
                                <div class="remove-image" onclick="removeSizeGuide()">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <input type="hidden" name="current_size_guide" value="{{ $produk->panduan_ukuran }}">
                        @else
                            <p class="text-muted">Belum ada panduan ukuran</p>
                        @endif
                    </div>
                </div>
                
                <!-- Input untuk panduan ukuran baru -->
                <div class="file-upload-area" id="sizeGuideArea">
                    <input type="file" name="panduan_ukuran" id="sizeGuide" class="d-none" accept="image/*">
                    <div class="file-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h5>Klik untuk mengganti gambar panduan ukuran</h5>
                    <p class="text-muted">Format file: JPG, PNG, JPEG (Maksimal 2MB)</p>
                </div>
                
                <!-- Preview panduan ukuran baru -->
                <div class="preview-container mt-3">
                    <div id="sizeGuidePreview"></div>
                </div>
                @error('panduan_ukuran')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                
                <!-- Input untuk menghapus panduan ukuran -->
                <input type="hidden" name="remove_size_guide" id="removeSizeGuide" value="0">
            </div>
        </div>
        
        <!-- Variasi Ukuran -->
        <div class="card mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-layer-group me-2"></i>Variasi Ukuran (Opsional)
                </div>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addSize()">
                    <i class="fas fa-plus me-1"></i>Tambah Ukuran
                </button>
            </div>
            <div class="card-body">
                <p class="text-muted">Tambahkan variasi ukuran jika produk memiliki beberapa pilihan ukuran</p>
                
                <div id="size-wrapper">
                    @if($produk->sizes && count($produk->sizes) > 0)
                        @foreach($produk->sizes as $index => $size)
                            <div class="size-item mb-3 border p-3 rounded">
                                <input type="hidden" name="sizes[{{ $index }}][id]" value="{{ $size->id }}">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Nama Ukuran</label>
                                        <input type="text" name="sizes[{{ $index }}][nama_ukuran]" class="form-control" placeholder="Masukkan ukuran" value="{{ old('sizes.'.$index.'.nama_ukuran', $size->nama_ukuran) }}">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Stok</label>
                                        <input type="number" name="sizes[{{ $index }}][stok]" class="form-control" placeholder="Masukkan stok" value="{{ old('sizes.'.$index.'.stok', $size->stok) }}">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" name="sizes[{{ $index }}][harga_formatted]" class="form-control harga-variasi" placeholder="Masukkan harga" value="{{ number_format(old('sizes.'.$index.'.harga', $size->harga), 0, ',', '.') }}">
                                            <input type="hidden" name="sizes[{{ $index }}][harga]" class="harga-variasi-hidden" value="{{ old('sizes.'.$index.'.harga', $size->harga) }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger mt-2" onclick="this.parentElement.remove()">
                                    <i class="fas fa-trash me-1"></i>Hapus Ukuran
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="size-item mb-3 border p-3 rounded">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label class="form-label">Nama Ukuran</label>
                                    <input type="text" name="sizes[0][nama_ukuran]" class="form-control" placeholder="Masukkan ukuran">
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">Stok</label>
                                    <input type="number" name="sizes[0][stok]" class="form-control" placeholder="Masukkan stok">
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" name="sizes[0][harga_formatted]" class="form-control harga-variasi" placeholder="Masukkan harga">
                                        <input type="hidden" name="sizes[0][harga]" class="harga-variasi-hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="d-flex gap-2 justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update Produk
            </button>
        </div>
    </form>
</div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pratinjau Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modalPreviewImage" class="img-fluid" alt="Preview">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        border: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 24px;
    }
    
    .card-header {
        background-color: white;
        border-bottom: 1px solid #eaeaea;
        padding: 20px 25px;
        border-radius: 12px 12px 0 0 !important;
        font-weight: 600;
        color: #4361ee;
        font-size: 1.25rem;
    }
    
    .card-body {
        padding: 25px;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #444;
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        padding: 12px 16px;
        border: 1px solid #ddd;
        transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }
    
    .btn-primary {
        background-color: #4361ee;
        border-color: #4361ee;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
    }
    
    .btn-secondary {
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
    }
    
    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }
    
    .image-preview {
        width: 150px;
        height: 150px;
        border-radius: 8px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border: 1px solid #eaeaea;
        cursor: pointer;
    }
    
    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .remove-image {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #ff4d4f;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        transition: all 0.3s;
    }
    
    .remove-image:hover {
        background: #ff1c1f;
        transform: scale(1.1);
    }
    
    .size-item {
        background-color: #f8f9fa;
    }
    
    .file-upload-area {
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 25px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background-color: #fafafa;
    }
    
    .file-upload-area:hover {
        border-color: #4361ee;
        background-color: #f0f4ff;
    }
    
    .file-upload-icon {
        font-size: 42px;
        color: #4361ee;
        margin-bottom: 10px;
    }
    
    .preview-container {
        margin-top: 20px;
    }
    
    @media (max-width: 768px) {
        .card-body {
            padding: 20px 15px;
        }
        
        .image-preview {
            width: 100px;
            height: 100px;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .d-flex.gap-2 {
            flex-direction: column;
        }
        
        .d-flex.gap-2 .btn {
            width: 100%;
        }
    }
    
    .form-check-input:checked {
        background-color: #4361ee;
        border-color: #4361ee;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let sizeIndex = {{ $produk->sizes ? count($produk->sizes) : 1 }};
        let deletedPhotos = [];
        
        // Fungsi untuk memformat input harga
        function formatRupiah(angka, prefix = '') {
            // Hapus semua karakter selain angka
            let number_string = angka.replace(/[^,\d]/g, '').toString();
            
            // Jika tidak ada angka, return string kosong
            if (number_string === '') return '';
            
            // Konversi ke number
            let number = parseInt(number_string);
            
            // Jika bukan number yang valid, return string kosong
            if (isNaN(number)) return '';
            
            // Format number dengan pemisah ribuan
            return number.toLocaleString('id-ID');
        }
        
        // Fungsi untuk menghapus format dan mendapatkan nilai numerik
        function unformatRupiah(rupiah) {
            // Hapus semua karakter selain angka
            return parseInt(rupiah.replace(/\./g, '')) || 0;
        }
        
        // Event listener untuk input harga umum
        const hargaFormattedInput = document.getElementById('harga_formatted');
        const hargaHiddenInput = document.getElementById('harga');
        
        hargaFormattedInput.addEventListener('input', function(e) {
            // Simpan posisi kursor
            const cursorPosition = this.selectionStart;
            
            // Format nilai
            this.value = formatRupiah(this.value);
            
            // Perbarui nilai hidden
            hargaHiddenInput.value = unformatRupiah(this.value);
            
            // Kembalikan posisi kursor
            this.setSelectionRange(cursorPosition, cursorPosition);
        });
        
        // Event listener untuk input harga variasi
        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('harga-variasi')) {
                const hiddenInput = e.target.nextElementSibling;
                
                // Simpan posisi kursor
                const cursorPosition = e.target.selectionStart;
                
                // Format nilai
                e.target.value = formatRupiah(e.target.value);
                
                // Perbarui nilai hidden
                hiddenInput.value = unformatRupiah(e.target.value);
                
                // Kembalikan posisi kursor
                e.target.setSelectionRange(cursorPosition, cursorPosition);
            }
        });
        
        // Event listener untuk mencegah karakter non-digit
        document.addEventListener('keypress', function(e) {
            if (e.target.id === 'harga_formatted' || e.target.classList.contains('harga-variasi')) {
                // Hanya menerima digit
                if (isNaN(parseInt(e.key)) && e.key !== 'Backspace' && e.key !== 'Delete') {
                    e.preventDefault();
                }
            }
        });
        
        window.addSize = function() {
            const wrapper = document.getElementById('size-wrapper');
            const item = document.createElement('div');
            item.classList.add('size-item', 'mb-3', 'border', 'p-3', 'rounded');
            item.innerHTML = `
                <div class="row">
                    <div class="col-12 mb-2">
                        <label class="form-label">Nama Ukuran</label>
                        <input type="text" name="sizes[${sizeIndex}][nama_ukuran]" class="form-control" placeholder="Masukkan ukuran">
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Stok</label>
                        <input type="number" name="sizes[${sizeIndex}][stok]" class="form-control" placeholder="Masukkan stok">
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="sizes[${sizeIndex}][harga_formatted]" class="form-control harga-variasi" placeholder="Masukkan harga">
                            <input type="hidden" name="sizes[${sizeIndex}][harga]" class="harga-variasi-hidden">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-danger mt-2" onclick="this.parentElement.remove()">
                    <i class="fas fa-trash me-1"></i>Hapus Ukuran
                </button>
            `;
            wrapper.appendChild(item);
            sizeIndex++;
        }
        
        // Product photos upload handling
        const productPhotosArea = document.getElementById('productPhotosArea');
        const productPhotosInput = document.getElementById('productPhotos');
        const productPhotosPreview = document.getElementById('productPhotosPreview');
        
        productPhotosArea.addEventListener('click', () => {
            productPhotosInput.click();
        });
        
        productPhotosArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            productPhotosArea.style.borderColor = '#4361ee';
            productPhotosArea.style.backgroundColor = '#f0f4ff';
        });
        
        productPhotosArea.addEventListener('dragleave', () => {
            productPhotosArea.style.borderColor = '#ddd';
            productPhotosArea.style.backgroundColor = '#fafafa';
        });
        
        productPhotosArea.addEventListener('drop', (e) => {
            e.preventDefault();
            productPhotosArea.style.borderColor = '#ddd';
            productPhotosArea.style.backgroundColor = '#fafafa';
            
            if (e.dataTransfer.files.length > 0) {
                productPhotosInput.files = e.dataTransfer.files;
                handleFileUpload(productPhotosInput.files, productPhotosPreview, true);
            }
        });
        
        productPhotosInput.addEventListener('change', () => {
            handleFileUpload(productPhotosInput.files, productPhotosPreview, true);
        });
        
        // Size guide upload handling
        const sizeGuideArea = document.getElementById('sizeGuideArea');
        const sizeGuideInput = document.getElementById('sizeGuide');
        const sizeGuidePreview = document.getElementById('sizeGuidePreview');
        
        sizeGuideArea.addEventListener('click', () => {
            sizeGuideInput.click();
        });
        
        sizeGuideInput.addEventListener('change', () => {
            handleFileUpload(sizeGuideInput.files, sizeGuidePreview, false);
        });
        
        // Handle file upload and preview
        function handleFileUpload(files, previewContainer, multiple) {
            if (!files || files.length === 0) return;
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                if (!file.type.match('image.*')) {
                    continue;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.classList.add('image-preview');
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    
                    // Add click event to show image in modal
                    div.addEventListener('click', function() {
                        document.getElementById('modalPreviewImage').src = e.target.result;
                        new bootstrap.Modal(document.getElementById('imagePreviewModal')).show();
                    });
                    
                    const removeBtn = document.createElement('div');
                    removeBtn.classList.add('remove-image');
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    removeBtn.addEventListener('click', (event) => {
                        event.stopPropagation();
                        div.remove();
                    });
                    
                    div.appendChild(img);
                    div.appendChild(removeBtn);
                    previewContainer.appendChild(div);
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Fungsi untuk menghapus foto yang sudah ada
        window.removeExistingPhoto = function(element, photoId) {
            // Tambahkan ID foto ke array yang akan dihapus
            deletedPhotos.push(photoId);
            document.getElementById('deletedPhotos').value = JSON.stringify(deletedPhotos);
            
            // Hapus elemen preview
            element.parentElement.remove();
        }
        
        // Fungsi untuk menghapus panduan ukuran
        window.removeSizeGuide = function() {
            // Set flag untuk menghapus panduan ukuran
            document.getElementById('removeSizeGuide').value = '1';
            
            // Hapus elemen preview
            document.getElementById('existingSizeGuidePreview').innerHTML = '<p class="text-muted">Panduan ukuran akan dihapus</p>';
        }
        
        // Pastikan semua nilai tersimpan dengan benar sebelum submit
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Update harga umum
            const hargaFormatted = document.getElementById('harga_formatted');
            const hargaHidden = document.getElementById('harga');
            hargaHidden.value = unformatRupiah(hargaFormatted.value);
            
            // Update semua harga variasi
            document.querySelectorAll('.harga-variasi').forEach(input => {
                const hiddenInput = input.nextElementSibling;
                hiddenInput.value = unformatRupiah(input.value);
            });
        });
    });
</script>
@endsection