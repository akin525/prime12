<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Updateuser

{
    public function profile(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);

            return  view('profile', compact('user'));

        }
    }

    public function profile1(Request $request)
    {
        if (Auth::check()) {

            $request->validate([
                'email' => 'required',
            ]);

            $user = User::find($request->user()->id);

            $user->name =$request->name;
            $user->email =$request->email;
            $user->phone =$request->number;
            $user->save();

            $mes ="Profile Update Successful";
            return  view('profile', compact('user', 'mes'));

        }
    }
}
