<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function index()
    {


    $user = Auth::user();
    if($user->role === 'admin'){
        $transaction = Transaction::get();
    }else{
    $transaction = Transaction::where('user_id', $user->id)->get();
    }
    return view('transaction.index', ['transaction'=>$transaction]);

    }

   public function create()
{
    
    $products = Product::all(); 


    return view('transaction.create', ['products' => $products]);    //compact('products'));
}
        public function store(Request $request){
         $request->validate([
        
        'product_id' => 'required|exists:products,id',
        'type' => 'required',
        'amount' => 'required',
        'notes' => 'required',
       
    ]);

        $id_user = Auth::id();

    $transaction = new Transaction;
    $transaction->product_id = $request->input('product_id');
    $transaction->type = $request->input('type');
    $transaction->amount = $request->input('amount');
    $transaction->notes = $request->input('notes');
    $transaction->user_id = $id_user;
    $transaction->save();

    $product = Product::find($request->input('product_id'));
   if ($request->type == 'in') {
    // Kalau transaksi masuk (In), stok bertambah
    $product->increment('stock', $request->amount);
} else {
    // Kalau transaksi keluar (Out), stok berkurang
    $product->decrement('stock', $request->amount);
}

            $product->save();
    

    return redirect('/transaction')->with('success', 'Transaksi berhasil !');
}

    public function edit($id)
    {
        $transaction = Transaction::with(['user', 'product'])->findOrFail($id);
        
        return view('transaction.edit',["transaction"=>$transaction]);
    }

      public function update($id, Request $request)
    {  
        $request->validate([
        
        'product_id' => 'required|exists:products,id',
        'type' => 'required',
        'amount' => 'required',
        'notes' => 'required',
        ]);
        $transaction = Transaction::findOrFail($id);

        
        $transaction->status = $request->input('status');

       return redirect('/transaction')->with('success', 'Status Transaksi berhasil di update!');
    }

    
}
