@extends('layouts.master')
@section('judul', 'List Product')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if (Auth::check() && Auth::user()->role === 'admin')
<a href="/product/create" class="btn btn-sm btn-primary my-3">Tambah</a>
@endif 

<div class="row">
    @forelse ($products as $item) <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ asset('image/' . $item->image) }}" 
                     class="card-img-top" 
                     style="height: 220px; object-fit: cover;" 
                     alt="{{ $item->name }}">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                    <span class="badge rounded-pill px-3 py-2" 
      style="background-color: #e0e7ff; color: #4338ca; font-weight: 600; font-size: 0.75rem; letter-spacing: 0.5px; border: 1px solid #c7d2fe;">
    {{ strtoupper($item->categories->name) }}
</span>
                    <p class="card-text text-dark">
                        {{ Str::limit($item->description, 90) }}
                    </p>
            <div class="d-grid"> 
        <a href="/product/{{ $item->id }}" class="btn btn-primary">Read More</a>
            </div>
            
@if (Auth::check() && Auth::user()->role === 'admin')
            <div class="row my-3">
                <div class="col">
                    <div class="d-grid">
        <a href="/product/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
            </div>
        </div>  

        <div class="col">
       <form action="/product/{{$item->id}}" method="POST">
            @csrf
            @method('DELETE')
        <div class="d-grid">
            <input type="submit" value="Delete" class="btn btn-danger"> 
       </form>





            </div>
            </div>
            </div>

@endif 
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <h4 class="text-muted">Belum ada produk tersedia.</h4>
        </div>
    @endforelse
</div>
@endsection
