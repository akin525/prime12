<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class Updateuser extends Controller

{
    public function updatepa(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'cpassword' => 'required',
            'fpassword' => 'required',
        ]);
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $input= $request->all();
            if ($request->cpassword != $request->fpassword){
                $mes="New Password not match";

                return view('changepass', compact('mes'));

            }
            if (!Hash::check($input['password'], $user->password)){
                $mes= "current-password not match";
                return view('changepass', compact('mes'));

            } else {

                $user->password =Hash::make($request->fpassword);
                $user->save();
                $mes1 = "Password update Successful";

                return view('changepass', compact('mes1'));
            }
        }
    }
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
