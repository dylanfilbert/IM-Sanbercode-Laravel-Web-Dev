<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function create(){
        return view('categories.tambah');
    }

    public function store(Request $request){
        
        //validasi
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],

        ]);

        $now = Carbon::now();

        //insert ke db
        DB::table('Categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        //redirect
        return redirect('/categories');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('categories.tampil', ['categories'=>$categories]);
    }

    public function show($id)
    {
        $category = DB::table('categories')->find($id);

        return view('categories.detail', ['category'=>$category]);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        return view('categories.edit', ['category'=>$category]);
    }
    public function update(Request $request, $id){
        
        //validasi
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],

        ]);

        $now = Carbon::now();

        //update ke db
        DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request ->input('name'),
                    'description' => $request ->input('description')
                ]);

        //redirect
        return redirect('/categories');
        
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        //redirect get /categories
        return redirect('/categories');
        
    }
}