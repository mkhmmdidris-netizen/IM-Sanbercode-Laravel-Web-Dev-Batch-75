@extends('layouts.master')
@section('judul')
    Tambah Categories
@endsection
@section('content')

<h1 class="text-primary">{{$category->name}}</h1> 
<p>{{$category->description}}</p>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
@forelse ($category->products as $item) 
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->name }}</td>
        <td>
            <a href="/product/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">Belum ada produk di kategori ini!</td>
    </tr>
@endforelse
  
  </tbody>
</table>

<a href="/categories" class="btn btn-secondary btn-sm">Kembali </a>
 
@endsection