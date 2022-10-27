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
use RealRashid\SweetAlert\Facades\Alert;

class AlltvController
{
    public function listtv(Request $request)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app2.mcd.5starcompany.com.ng/api/reseller/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'tv'),
            CURLOPT_HTTPHEADER => array(
                'Authorization: mcd_key_tGSkWHl5fJZsJev5FRyB5hT1HutlCa'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $data = json_decode($response, true);
        $plan= $data["data"];
        foreach ($plan as $pla) {
            $id = $pla['type'];
            $name = $pla['name'];
            $amount = $pla['amount'];
            $code = $pla['code'];
return $response;
            $bo = data::create([
                'plan_id' => $code,
                'code' => $code,
                'plan' => $name,
                'network' => $id,
                'amount' => $amount,
                'tamount' => $amount,
                'ramount' => $amount,
                'cat_id' => $code,
            ]);
        }
    }

    public function verifytv(Request $request)
    {
//        return $request;
        $ve=data::where('network', $request->network)->first();
//        return $request;
$pla=data::where('network',  $request->network)->get();
//return $ve;
        $resellerURL='https://app2.mcd.5starcompany.com.ng/api/reseller/';


        $curl = curl_init();


        curl_setopt_array($curl, array(

            CURLOPT_URL => $resellerURL.'validate',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('service' => 'tv', 'coded' =>$request->network, 'phone' => $request->phone),
            CURLOPT_HTTPHEADER => array(
                'Authorization: MCDKEY_903sfjfi0ad833mk8537dhc03kbs120r0h9a'
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);
//        echo $response;
//return $response;
        $data = json_decode($response, true);
        if (isset($data['message'])){
            $success= $data["message"];
            $log=$data['data'];
        }else{
            $log= "Unable to Identify IUC Number";
        }
        return view('tvp', compact('log', 'request', 've', 'request', 'pla'));


    }

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
        $request->validate([
            'id'=>'required',
            'number'=>'required',
        ]);
        if (Auth::check()) {
            $user = User::find($request->user()->id);
            $tv = data::where('id', $request->id)->first();

//return $tv;
            if ($user->wallet < $tv->tamount) {
                $mg = "You Cant Make Purchase Above" . "NGN" . $tv->tamount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                Alert::error('Ooops..', $mg);
                return redirect('tv');
            }
            if ($tv->tamount < 0) {

                $mg = "error transaction";
                Alert::error('Ooops..', $mg);
                return redirect('tv');
            }
            $bo = bo::where('refid', $request->refid)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                Alert::success('Ooops..', $mg);
                return redirect('tv');
            } else {
                $gt = $user->wallet - $tv->tamount;


                $user->wallet = $gt;
                $user->save();

                $bo = bo::create([
                    'username' => $user->username,
                    'plan' => $tv->network,
                    'amount' => $tv->tamount,
                    'server_res' => 'oooo',
                    'result' => 1,
                    'phone' => $request->number,
                    'refid' => $request->refid,
                ]);

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
