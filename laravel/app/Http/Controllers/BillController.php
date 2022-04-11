<?php
namespace App\Http\Controllers;
use App\Mail\Emailfund;
use App\Mail\Emailtrans;
use App\Models\bo;
use App\Models\data;
use App\Models\deposit;
use App\Models\profit;
use App\Models\setting;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BillController
{

    public function bill(Request $request)
    {
        $request->validate([
            'productid' => 'required',
        ]);
        if (Auth::check()) {
            $user = User::find($request->user()->id);
//            $wallet = wallet::where('username', $user->username)->first();




            if ($user->wallet < $request->amount) {
                $mg = "You Cant Make Purchase Above" . "NGN" . $request->amount . " from your wallet. Your wallet balance is NGN $user->wallet. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

                return view('bill', compact('user', 'mg'));

            }
            if ($request->amount < 0) {

                $mg = "error transaction";
                return view('bill', compact('user', 'mg'));

            }
            $bo = bo::where('refid', $request->id)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                return view('bill', compact('user', 'mg'));

            } else {
                $user = User::find($request->user()->id);
                $bt = data::where("id", $request->productid)->get();
//                $wallet = wallet::where('username', $user->username)->first();

                $gt = $user->wallet - $request->amount;


                $user->wallet= $gt;
                $user->save();

                foreach ($bt as $fg) {

                    if ($fg->plan == "airtime") {

                        $resellerURL = 'https://mobile.primedata.com.ng/api/';
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL =>  $resellerURL . 'bill',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('id'=>$request->id, 'productid'=>$request->productid, 'service' => 'airtime', 'coded' => $fg->cat_id, 'number' => $request->number, 'amount' => $request->amount, 'reseller_price' => $request->amount),

                            CURLOPT_HTTPHEADER => array(
                                'apikey: PRIME6251e00adbc770.70038796'
                            )));

                        $response = curl_exec($curl);

                        curl_close($curl);
                    echo $response;
//                        return $response;

//    return;
                        $data = json_decode($response, true);
                        $success = $data["success"];
//                        $tran1 = $data["discountAmount"];

                        if ($success==1) {

                            $bo = bo::create([
                                'username' => $user->username,
                                'plan' => $fg->plan,
                                'amount' => $request->amount,
                                'server_res' => 'null',
                                'result' => $success,
                                'phone' => $request->number,
                                'refid' => $request->id,
                            ]);



                            $name= $fg->plan;
                            $am= "NGN $request->amount  Airtime Purchase Was Successful To";
                            $ph= $request->number;

                            $receiver=$user->email;
                            $admin= 'admin@primedata.com.ng';

//                            Mail::to($receiver)->send(new Emailtrans($bo ));
//                            Mail::to($admin)->send(new Emailtrans($bo ));

                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                        }elseif ($success==0){
                            $zo=$user->wallet+$request->amount;
                            $user->wallet = $zo;
                            $user->save();

                            $name= $fg->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";

                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                        }

                    } else {
                        $pop= $fg->amount;

                        $resellerURL = 'https://mobile.primedata.com.ng/api/';
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL =>  $resellerURL . 'bill',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('id'=>$request->id, 'productid'=>$request->productid, 'action' => 'data-topup', 'category_id' => $fg->cat_id, 'plan_id' => $fg->plan_id, 'contact_opt' => '2', 'number' => $request->number, 'amount'=>$pop),
                            CURLOPT_HTTPHEADER => array(
                                'apikey: PRIME6251e00adbc770.70038796'
                            )));
                        $response = curl_exec($curl);

                        curl_close($curl);
                        // echo $response;



//return $response;
                        $data = json_decode($response, true);

                        $success = $data["success"];
//                        $msg2 = $data['msg'];
                        $po =$request->amount  - $fg->amount;

                        if ($success ==1){
                            $bo = bo::create([
                                'username' => $user->username,
                                'plan' => $fg->plan,
                                'amount' => $request->amount,
                                'server_res' =>'null',
                                'result' => $success,
                                'phone' => $request->number,
                                'refid' => $request->id,
                            ]);

                            $profit = profit::create([
                                'username' => $user->username,
                                'plan' => $fg->plan,
                                'amount' => $po,
                            ]);

                            $name= $fg->plan;
                            $am= "$fg->plan  was successful delivered to";
                            $ph= $request->number;


                            $receiver=$user->email;
                            $admin= 'admin@primedata.com.ng';

//                            Mail::to($receiver)->send(new Emailtrans($bo ));
//                            Mail::to($admin)->send(new Emailtrans($bo ));
                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));

                        }elseif ($success==0){
                            $zo=$user->wallet+$request->amount;
                            $user->wallet = $zo;
                            $user->save();

                            $name= $fg->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";

                            return view('bill', compact('user', 'name', 'am', 'ph', 'success'));


                        }


                    }
                }
            }
        }



    }

}



