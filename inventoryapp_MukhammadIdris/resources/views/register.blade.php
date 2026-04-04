@extends('layouts.master')
@section('judul')
    Register
@endsection
@section('content')
    <h1>Create New Account!</h1>
    <h2>Sign Up Form</h2>
    <form action="welcome" method="post">
        @csrf
        <input type="text" name="nama_depan" placeholder="Nama Depan" required> <br> <br>
        <input type="text" name="nama_belakang" placeholder="Nama Belakang" required> <br> <br>
        <label>Gender :</label><br>
        <input type="radio" name="Gender">Male<br>
        <input type="radio" name="Gender">Female<br>
        <input type="radio" name="Gender">Other<br><br>
        <label>Nationality: </label> <br>
        <select name="Nationality">
            <option value="Indonesia">Indonesia</option>
            <option value="Singapore">Singapore</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Australian">Australian</option>
        </select><br><br>
        <label>Languange Spoken:</label><br>
        <input type="checkbox" name="Languange Spoken">Bahasa Indonesia<br>
        <input type="checkbox" name="Languange Spoken">English<br>
        <input type="checkbox" name="Languange Spoken">Other<br><br><br>
        <label>Bio:</label><br>
<textarea name="massage" rows="10" cols="30"></textarea>
<br>
<button type="submit">Submit</button>
    </form>


@endsection
    