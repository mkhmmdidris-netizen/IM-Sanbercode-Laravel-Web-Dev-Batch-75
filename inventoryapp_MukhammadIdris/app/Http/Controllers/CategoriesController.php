<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function create ()
    {
        return view ('genre.tambah');
    }
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
        ], [
            'required'  => 'Inputan :attribute wajib diisi',
            'min' => "Inputan :attribute minimal :min karakter"
        ]);

        $now= Carbon::now();

        DB::table('categories')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/categories')->with('success', 'category berhasil ditambah!');

    }

    public function index()
    {
        $categories = DB::table('categories')->get();
 
        return view('genre.index', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = Categories::findOrFail($id);

        return view('genre.detail', compact('category'));

    }

     public function edit($id)
    {
        $category = DB::table('categories')->find($id);

        return view('genre.edit', ['category' => $category]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
        ], [
            'required'  => 'Inputan :attribute wajib diisi',
            'min' => "Inputan :attribute minimal :min karakter"
        ]);

        $now= Carbon::now();

        DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    
                ]
                
            );
            return redirect('/categories')->with('success', 'category berhasil diubah!');
    }

    public function destroy($id)
{

    DB::table('categories')->where('id', $id)->delete();

    return redirect('/categories')->with('success', 'Category Berhasil Dihapus!');
}
}
