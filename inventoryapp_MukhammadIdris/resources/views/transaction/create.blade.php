@extends('layouts.master')
@section('judul')
    Input Transaction
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger shadow-sm">
        <h5 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Silahkan Lengkapi !</h5>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/transaction" method="POST">
    @csrf

   
    <div class="mb-3">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-control">
            <option value="">--- Pilih Product ---</option>
            @forelse ($products as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option value="">Product Kosong!</option>
            @endforelse
        </select>
    </div>

    
    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control">
             <option value="">--- Pilih Product ---</option>
            <option value="in">Produk Masuk </option>
            <option value="out">Produk Keluar </option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Amount</label>
        <input type="number" name="amount" class="form-control" placeholder="Masukkan jumlah barang...">
    </div>

  
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="3" placeholder="Tambahkan catatan jika ada..."></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Transaction</button>
</form>
@endsection