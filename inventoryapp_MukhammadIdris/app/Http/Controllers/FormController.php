<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
public function showRegisterForm() {
    return view('register');
}

public function processRegister(Request $request){
    $nama_depan = $request->input('nama_depan');
    $nama_belakang = $request->input('nama_belakang');
    
    return view('welcome_user', compact('nama_depan', 'nama_belakang'));
}
}
