<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model

{
    use HasFactory;

   protected $fillable = [
    'product_id',
    'nama_ukuran',
    'stok',
    'harga',
];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
