<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
{
    Schema::create('product_sizes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        
        $table->string('nama_ukuran')->nullable();
        $table->integer('stok')->nullable();
        $table->decimal('harga', 15, 2)->nullable();
        
        $table->string('panduan_ukuran')->nullable(); // file/gambar opsional
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
};
