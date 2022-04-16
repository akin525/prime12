<?php

namespace App\Http\Controllers;

use App\Mail\Emailtrans;
use App\Models\bo;
use App\Models\data;
use App\Models\Messages;
use App\Models\refer;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AlltvController
{
    public function listtv(Request $request)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://mobile.primedata.com.ng/api/listtv',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => array(),
            CURLOPT_HTTPHEADER => array(
                'apikey: PRIME624fee6e546747.77054028'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        return $response;
        $data = json_decode($response, true);
        $plan= $data["data"];
        foreach ($plan as $pla) {
            $id = $pla['plan_id'];
            $name = $pla['network'];
            $amount = $pla['amount'];
            $code = $pla['cat_id'];
//return $response;
            $bo = data::create([
                'plan_id' => $id,
                'plan' => 'tv',
                'network' => $name,
                'amount' => $amount,
                'tamount' => $amount,
                'cat_id' => $code,
            ]);
        }
    }

    public function verifytv(Request $request)
    {
//        return $request;
        $ve=data::where('plan_id', $request->network)->first();
//        return $request;
$pla=data::where('plan_id',  $request->network)->get();
//return $ve;
        $resellerURL='https://mobile.primedata.com.ng/api/';


        $curl = curl_init();


        curl_setopt_array($curl, array(

            CURLOPT_URL => $resellerURL.'verifytv',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('productid' => $ve->plan_id,  'number' => $request->phone),
            CURLOPT_HTTPHEADER => array(
                'apikey: PRIME624fee6e546747.77054028'
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
//return $response;
        $data = json_decode($response, true);
        $success= $data["message"];
        if ($success){
            $log=$success;
        }else{
            $log= "Unable to Identify IUC Number";
        }
        return view('tvp', compact('log', 'request', 've', 'request', 'pla'));


    }
//    public function process(Request $request)
//    {
//        if (Auth::check()) {
//            $user = User::find($request->user()->id);
//            $tv = data::where('id', $request->id)->first();
//
//            return  view('tvp', compact('user', 'request'));
//
//        }
//        return redirect("login")->withSuccess('You are not allowed to access');
//
//    }
    public function tv(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $tv = data::where('plan', 'tv')->get();

            return  view('tv', compact('user', 'tv'));

        }
        return redirect("login")->withSuccess('You are not allowed to access');

    }

    public function paytv(Request $request)
    {
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $tv = data::where('id', $request->id)->first();

//return $tv;
            if ($user->wallet < $tv->tamount) {
                $mg = "You Cant Make Purchase Above" . "NGN" . $tv->tamount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return view('bill', compact('user', 'mg'));

            }
            if ($tv->tamount < 0) {

                $mg = "error transaction";
                return view('bill', compact('user', 'mg'));

            }
            $bo = bo::where('refid', $request->refid)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return view('bill', compact('user', 'mg'));

            } else {
                $gt = $user->wallet - $tv->tamount;


                $user->wallet = $gt;
                $user->save();

                $resellerURL = 'https://mobile.primedata.com.ng/api/';

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $resellerURL.'paytv',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('refid' =>$request->refid,  'coded' => $tv->cat_id, 'number' => $request->number),
                    CURLOPT_HTTPHEADER => array(
                        'apikey: PRIME6251e00adbc770.70038796'
                    )
                ));

                $response = curl_exec($curl);

                curl_close($curl);
//                    echo $response;
//                return $response;
                $data = json_decode($response, true);
//                $success = $data["am"];
//                $tran1 = $data["discountAmount"];

//                        return $response;
                if (isset($data['am'])) {

                    $bo = bo::create([
                        'username' => $user->username,
                        'plan' => $tv->network,
                        'amount' => $tv->tamount,
                        'server_res' => $response,
                        'result' => 1,
                        'phone' => $request->number,
                        'refid' => $request->refid,
                    ]);

$success=1;
                    $name = $tv->plan;
                    $am = $tv->network."was Successful to";
                    $ph = $request->number;




                    return view('bill', compact('user', 'name', 'am', 'ph', 'success'));


                }else{
                    $success=0;

                    $zo=$user->wallet+$tv->tamount;
                    $user->wallet = $zo;
                    $user->save();

                    $name= $tv->network;
                    $am= "NGN $request->amount Was Refunded To Your Wallet";
                    $ph=", Transaction fail";

                    return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                }
            }
        }
    }

}
