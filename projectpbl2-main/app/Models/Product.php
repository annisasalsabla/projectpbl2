<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',   // harga umum (kalau tidak pakai ukuran)
        'stok',    // stok umum (kalau tidak pakai ukuran)
        'bahan',
        'deskripsi',
        'panduan_ukuran',
        'pre_order',
    ];

    protected $casts = [
        'pre_order' => 'boolean',
    ];

    public function photos()
{
    return $this->hasMany(ProductPhoto::class, 'product_id');
}

public function sizes()
{
    return $this->hasMany(ProductSizes::class, 'product_id');
}


    // ambil harga minimum
    public function minPrice()
    {
        if ($this->sizes()->count() > 0) {
            return $this->sizes()->min('harga');
        }
        return $this->harga;
    }

    // total stok
    public function stokTotal()
    {
        if ($this->sizes()->count() > 0) {
            return $this->sizes()->sum('stok');
        }
        return $this->stok;
    }
}
