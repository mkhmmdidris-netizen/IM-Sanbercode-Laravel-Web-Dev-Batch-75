@extends('layouts.master')
@section('judul', 'Create Profile')

@section('content')




@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/profile" method="POST">
  @csrf 
  <div class="mb-3">
    <label class="form-label">Age</label>
    <input type="number" class="form-control" name="age" >
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Bio </label>
    <textarea name="bio" class="form-control"  cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection