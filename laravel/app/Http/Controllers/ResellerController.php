<?php

namespace App\Http\Controllers;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;
use App\Models\setting;
use App\Models\wallet;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ResellerController
{
    public function sell(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();


//            $wallet->account_number = $number;-
//            $wallet->account_name = $account;
//            $wallet->save();

            return view('reseller', compact('user', 'wallet'));



        }
    }
    public function apiaccess(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();


//            $wallet->account_number = $number;-
//            $wallet->account_name = $account;
//            $wallet->save();

            return view('upgrade', compact('user'));



        }
    }
    public function reseller(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $wallet = wallet::where('username', $user->username)->first();



            if ($wallet->balance < $request->amount) {
                $mg = "You Cant Upgrade Your Account" . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return view('bill', compact('user', 'mg'));

            }
            if ($request->amount < 0) {

                $mg = "error transaction";
                return view('bill', compact('user', 'mg'));

            }else {
                $user = User::find($request->user()->id);
                $wallet = wallet::where('username', $user->username)->first();


                $gt = $wallet->balance - $request->amount;


                $wallet->balance = $gt;
                $wallet->save();


                $token = uniqid('PRIME',true);

                $user->apikey = $token;
                $user->save();

                return redirect("upgrade")->withSuccess('You are not allowed to access');
            }


        }
    }
}
