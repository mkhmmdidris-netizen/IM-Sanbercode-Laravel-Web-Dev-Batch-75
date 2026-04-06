@extends('layouts.master')
@section('judul')
    Tampil Categoies
@endsection
@section('content')

<a href="/categories/create" class= "btn btn-primary btn-sm my-2">Tambah</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $item)
    <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
          
            <form action="/categories/{{$item->id}}" method="POST">
                @csrf
                @method("DELETE")

                  <a href="/categories/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
            <a href="/categories/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>


            </td>
         
    </tr>
    @empty
        <tr>
            <td> Data Category Kosong silahkan ditambahkan</td>
        </tr>
    @endforelse

  </tbody>

</table>

@endsection