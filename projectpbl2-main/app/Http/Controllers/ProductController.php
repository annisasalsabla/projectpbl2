<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\ProductSizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index()
    {
        $produk = Product::with(['photos','sizes'])->get();
        return view('admin.product.index', compact('produk'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_produk'=>'required|string|max:255',
        'kategori'=>'required|in:Anak-anak,Remaja,Dewasa',
        'bahan'=>'required|string|max:255',
        'deskripsi'=>'required|string',
        'pre_order'=>'nullable|boolean',
        'harga'=>'nullable|string',
        'stok'=>'nullable|string',
        'photos.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'sizes'=>'nullable|array',
        'sizes.*.nama_ukuran'=>'nullable|string',
        'sizes.*.stok'=>'nullable|string',
        'sizes.*.harga'=>'nullable|string',
        'sizes.*.panduan_ukuran'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data = $request->only(['nama_produk','kategori','bahan','deskripsi','pre_order']);
   $data['harga'] = $request->harga ? preg_replace('/[^0-9]/', '', $request->harga) : null;
$data['stok']  = $request->stok ? preg_replace('/[^0-9]/', '', $request->stok) : null;

    // ⬇️ SIMPAN PRODUK UTAMA DULU
    $product = Product::create($data);

    // simpan ukuran kalau ada
    if($request->has('sizes')){
        foreach($request->sizes as $size){
            if($size['nama_ukuran'] || $size['stok'] || $size['harga']){
                $path = null;
                if(isset($size['panduan_ukuran']) && $size['panduan_ukuran'] instanceof \Illuminate\Http\UploadedFile){
                    $path = $size['panduan_ukuran']->store('panduan_ukuran','public');
                }

                ProductSizes::create([
                    'product_id'=>$product->id,
                    'nama_ukuran'=>$size['nama_ukuran'],
                    'stok'=>$size['stok'] ? preg_replace('/[^0-9]/', '', $size['stok']) : null,
                    'harga'=>$size['harga'] ? preg_replace('/[^0-9]/', '', $size['harga']) : null,
                    'panduan_ukuran'=>$path,
                ]);
            }
        }
    }

    // simpan foto produk
    if($request->hasFile('photos')){
        foreach($request->file('photos') as $photo){
            ProductPhoto::create([
                'product_id'=>$product->id,
                'path_gambar'=>$photo->store('product_photos','public'),
                'utama'=>0
            ]);
        }
    }

    return redirect()->route('admin.products.manage')->with('success','Produk berhasil ditambahkan!');
}

    
    public function edit(Product $product)
    {
        $product->load(['sizes','photos']);
        return view('admin.product.edit', ['produk' => $product]);
    }

   public function update(Request $request, Product $product)
{
    $request->validate([
        'nama_produk'=>'required|string|max:255',
        'kategori'=>'required|in:Anak-anak,Remaja,Dewasa',
        'bahan'=>'required|string|max:255',
        'deskripsi'=>'required|string',
        'pre_order'=>'nullable|boolean',
        'harga'=>'nullable|string',
        'stok'=>'nullable|string',
        'panduan_ukuran'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'photos.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'sizes'=>'nullable|array',
        'sizes.*.nama_ukuran'=>'nullable|string',
        'sizes.*.stok'=>'nullable|string',
        'sizes.*.harga'=>'nullable|string',
    ]);

    $data = $request->only(['nama_produk','kategori','bahan','deskripsi','pre_order']);
    $data['harga'] = $request->filled('harga') ? str_replace('.', '', $request->harga) : null;
    $data['stok']  = $request->filled('stok') ? str_replace('.', '', $request->stok) : null;

    // update panduan ukuran jika ada
    if($request->hasFile('panduan_ukuran')){
        $data['panduan_ukuran'] = $request->file('panduan_ukuran')->store('panduan_ukuran','public');
    }

    $product->update($data);

    // hapus ukuran lama & insert baru
    $product->sizes()->delete();
    // Bersihkan harga & stok ukuran sebelum simpan
if ($request->sizes) {
    foreach ($request->sizes as $size) {
        ProductSizes::create([
            'product_id'   => $product->id,
            'nama_ukuran'  => $size['nama_ukuran'],
            'stok'         => $size['stok'] ? preg_replace('/[^0-9]/', '', $size['stok']) : null,
            'harga'        => $size['harga'] ? preg_replace('/[^0-9]/', '', $size['harga']) : null,
            'panduan_ukuran' => $path ?? null,
        ]);
    }


    }

    // tambah foto baru
    if($request->hasFile('photos')){
        foreach($request->file('photos') as $photo){
            ProductPhoto::create([
                'product_id'=>$product->id,
                'path_gambar'=>$photo->store('product_photos','public'),
                'utama'=>0
            ]);
        }
    }

    return redirect()->route('admin.products.manage')->with('success','Produk berhasil diupdate!');
}




public function destroy(Product $product)
{
    // hapus foto produk
    foreach ($product->photos as $photo) {
        if ($photo->path_gambar && Storage::disk('public')->exists($photo->path_gambar)) {
            Storage::disk('public')->delete($photo->path_gambar);
        }
        $photo->delete();
    }

    // hapus ukuran produk
    foreach ($product->sizes as $size) {
        if ($size->panduan_ukuran && Storage::disk('public')->exists($size->panduan_ukuran)) {
            Storage::disk('public')->delete($size->panduan_ukuran);
        }
        $size->delete();
    }

    // hapus panduan ukuran umum
    if ($product->panduan_ukuran && Storage::disk('public')->exists($product->panduan_ukuran)) {
        Storage::disk('public')->delete($product->panduan_ukuran);
    }

    // hapus produk utama
    $product->delete();

    return redirect()->route('admin.products.manage')
                     ->with('success','Produk berhasil dihapus!');
}

};