<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function getProfile()
    {

        $currentUser = Auth::user();

        $user = User::find($currentUser->id);
        //dd($currentUser->profile);
            if($user->profile){
                $profile = Profile::where('user_id', $user->id)->first();
                return view('profile.update', ['profile'=> $profile]);
            }else{
                return view('profile.add');
            }
        
    }

public function store(Request $request)
{
    $request->validate([
        'age' => 'required',
        'bio' => 'required',
    ]);

    $currentUser = Auth::user();

    
    $profile = Profile::updateOrCreate(
        ['user_id' => $currentUser->id], 
        [
            'age' => $request->input('age'),
            'bio' => $request->input('bio'),
        ]
    );

    return redirect('/profile')->with('success', 'Berhasil Update Profile!');
}
}
