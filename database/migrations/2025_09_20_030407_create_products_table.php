<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');
        $table->enum('kategori', ['Anak-anak', 'Remaja', 'Dewasa']);
        
        // harga & stok default (untuk produk TANPA ukuran)
        $table->decimal('harga', 15, 2)->nullable();
        $table->integer('stok')->nullable();

        $table->string('bahan');
        $table->text('deskripsi');
        $table->boolean('pre_order')->default(false); // checkbox PreOrder
        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
