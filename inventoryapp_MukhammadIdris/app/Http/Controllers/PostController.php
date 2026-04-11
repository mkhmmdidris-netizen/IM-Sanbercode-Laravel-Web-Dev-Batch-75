<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('admin', except: ['index', 'show']),
        ];
    }
    public function index()
    {
       $categories =Categories::get();

       return view('categories.product', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();

        return view('categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'description' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ]);

            $imageName = time().'.'.$request->image->extension(); 

            $request->image->move(public_path('image'), $imageName);

            $product = new product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->stock = $request->input('stock'); 
            $product->category_id = $request->input('category_id'); 
            $product->price = $request->input('price');
            $product->image = $imageName;
            $product->save();
        
                return redirect('/product')->with('success', 'product berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('categories.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
   
    $product = Product::find($id);
    $categories = Categories::get();
    return view('categories.edit', ['product' =>$product, 'categories' => $categories]);
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{

    $request->validate([
        'name' => 'required|min:6',
        'description' => 'required',
        'category_id' => 'required',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        'image' => 'mimes:png,jpg,jpeg|max:2048',
    ]);

   
    $product = Product::find($id);

  
    if ($request->hasFile('image')) {
      if($product->image){
        if(File::exists(public_path('image/'. $product->image))){
            File::delete(public_path('image/'. $product->image));
    }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $product->image = $imageName;
    }

    }
    $product->name = $request->name;
    $product->description = $request->description;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->category_id = $request->category_id;

    
    $product->save();

    return redirect('/product')->with('success', 'Product berhasil diedit!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
 
        if($product->image){
            if(File::exists(public_path('image/'. $product->image))){
                File::delete(public_path('image/'. $product->image));
            }
        }

        $product->delete();
        
        return redirect('/product')->with('success', 'Product berhasil dihapus!');
    }
}
