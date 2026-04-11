@extends('layouts.master')
@section('judul', 'Create Product')

@section('content')


   <form action="/product" method="POST" enctype="multipart/form-data">
    @csrf

    
<div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
    
    @error('name')
        <div class="text-danger">{{ 'Nama minimal 6 huruf !' }}</div>
    @enderror
</div>

  
 
<div class="mb-3">
    <label class="form-label">Description Product</label>
    <textarea name="description" 
              class="form-control @error('description') is-invalid @enderror" 
              rows="3">{{ old('description') }}</textarea>
    
    @error('description')
        <div class="text-danger mt-1">{{ 'Description Harus Di Isi !' }}</div>
    @enderror
</div>

   
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" value="{{old('price') }}">
    </div>

   
<div class="mb-3">
    <label class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control" placeholder="Masukkan jumlah stok" value="{{ old('stock') }}">
</div>

    
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- Select Category --</option>
            @forelse ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option value="">Kategori Belum Ada</option>
            @endforelse
        </select>
    </div>



    
    <div class="mb-3">
        <label class="form-label">Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary w-10">Submit</button>
</form>
@endsection