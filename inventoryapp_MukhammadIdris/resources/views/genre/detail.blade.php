@extends('layouts.master')
@section('judul')
    Tambah Categories
@endsection
@section('content')

<h1 class="text-primary">{{$category->name}}</h1> 

<p>{{$category->description}}</p>

<a href="/categories" class="btn btn-secondary btn-sm">Kembali </a>
 
@endsection