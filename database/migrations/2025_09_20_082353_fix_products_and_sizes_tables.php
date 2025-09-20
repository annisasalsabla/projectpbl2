<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom panduan_ukuran ke products
        Schema::table('products', function (Blueprint $table) {
            $table->string('panduan_ukuran')->nullable()->after('deskripsi');
        });

        // Hapus panduan_ukuran dari product_sizes kalau ada
        Schema::table('product_sizes', function (Blueprint $table) {
            if (Schema::hasColumn('product_sizes', 'panduan_ukuran')) {
                $table->dropColumn('panduan_ukuran');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('panduan_ukuran');
        });

        Schema::table('product_sizes', function (Blueprint $table) {
            $table->string('panduan_ukuran')->nullable();
        });
    }
};
