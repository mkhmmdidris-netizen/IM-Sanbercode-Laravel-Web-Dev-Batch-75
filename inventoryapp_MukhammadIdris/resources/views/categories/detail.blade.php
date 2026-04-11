@extends('layouts.master')
@section('judul', 'Detail Product')

@section('content')
<div class="container mt-4">
<div class="card shadow-sm border-0">
<div class="row g-0">
<div class="col-md-6">
<img src="{{ asset('image/' . $product->image) }}" 
    class="img-fluid rounded-start" 
    style="width: 100%; height: 400px; object-fit: cover;" 
    alt="{{ $product->name }}">
</div>
            
<div class="col-md-6">
<div class="card-body">
    <h2 class="fw-bold">{{ $product->name }}</h2>
    <hr>
    <h4 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
<p class="mt-3 text-muted">
    <strong>Stock:</strong> {{ $product->stock }} pcs
</p>
<p class="mt-3">
    <strong>Description:</strong><br>
    {{ $product->description }}
</p>
                    
    <div class="mt-4">
    <a href="/product" class="btn btn-secondary btn-sm">Kembali</a>
                        
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

