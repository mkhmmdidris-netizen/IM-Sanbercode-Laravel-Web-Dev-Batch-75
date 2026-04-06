@extends('layouts.master')
@section('judul')
    Tambah Categories
@endsection
@section('content')


   <form action="/categories" method="POST">
    @csrf 

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    
  <div class="mb-3">
    <label class="form-label">Categories Name</label>
    <input type="text" class="form-control" name="name" >
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Categories Description</label>
    <textarea name="description" class="form-control"  cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection