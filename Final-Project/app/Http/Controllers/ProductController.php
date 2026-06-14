<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function create () {
        $categories = DB::table('categories')->get();
        return view('product.tambah', compact('categories'));
    }

    public function store(Request $request){

        //validasi
        $request->validate([
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'price' => ['required'],
            'stock' => ['required'],
            'categories_id' => ['required'],

        ]);
        $imagePath = null; 
    
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        }

        $now = Carbon::now();

        //insert ke db
        DB::table('product')->insert([
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'categories_id' => $request->input('categories_id'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        //redirect
        return redirect('/product');
    }
    
    public function index()
    {
        $product = DB::table('product')
        ->join('categories', 'product.categories_id', '=', 'categories.id')
        ->select('product.*', 'categories.name as category_name')
        ->get();

        return view('product.tampil', ['product'=>$product]);
    }

    public function show($id)
    {
        
        $product = DB::table('product')
            ->join('categories', 'product.categories_id', '=', 'categories.id')
            ->select('product.*', 'categories.name as category_name')
            ->where('product.id', $id) 
            ->first();                 

      
        if (!$product) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan');
        }              
        
        return view('product.detail', ['product' => $product]);
    }

    public function edit($id)
    {

        $product = DB::table('product')->where('id', $id)->first();

        if (!$product) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan');
        }

        $categories = DB::table('categories')->get();

        return view('product.edit', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'description'   => ['required'],
            'image'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            'price'         => ['required'],
            'stock'         => ['required'],
            'categories_id' => ['required'],
        ]);

        $product = DB::table('product')->where('id', $id)->first();

        if (!$product) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan');
        }

        $imagePath = $product->image; 

        if ($request->hasFile('image')) {
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
        }

        DB::table('product')->where('id', $id)->update([
            'description'   => $request->input('description'),
            'image'         => $imagePath, 
            'price'         => $request->input('price'),
            'stock'         => $request->input('stock'),
            'categories_id' => $request->input('categories_id'),
            'updated_at'    => Carbon::now()
        ]);


        return redirect('/product')->with('success', 'Produk berhasil diperbarui!');
    }
    public function destroy($id)
    {
        DB::table('product')->where('id', '=', $id)->delete();
        return redirect('/product');
    }
}
