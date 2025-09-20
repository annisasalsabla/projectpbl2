<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'path_gambar',
        'utama',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

