@extends('layouts.master')
@section('judul', 'Update Product')

@section('content')
<div class="container mt-4">
    <form action="/transaction/{{ $transaction->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="name" class="form-control" value="{{ $transaction->name }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $transaction->price }}">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $transaction->stock }}">
        </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control">
            <option value="">-- Select Category --</option>
            @forelse ($transaction as $item)
                    @if ($item->id === $transaction->category_id)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else 
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
            @empty
                <option value="">Kategori Belum Ada</option>
            @endforelse
        </select>
    </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
        </div>

</div>
        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">Simpan Edit</button>
        
    </form>
</div>
@endsection