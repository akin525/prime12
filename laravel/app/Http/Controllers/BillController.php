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
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class BillController
{

    public function bill(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => ['required', 'string',  'min:11', 'max:11'],
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
                Alert::error('Ooops..', $mg);
                return redirect('select');
            }
            $bo = bo::where('refid', $request->refid)->first();
            if (isset($bo)) {
                $mg = "duplicate transaction";
                Alert::error('Ooops..', $mg);
                return redirect('select');

            } else {
                $user = User::find($request->user()->id);
                $bt = data::where("plan_id", $request->name)->first();

                $gt = $user->wallet - $bt->tamount;


                $user->wallet= $gt;
                $user->save();

                        $pop= $bt->amount;
                $bo = bo::create([
                    'username' => $user->username,
                    'plan' => $bt->plan,
                    'amount' => $bt->tamount,
                    'server_res' =>'null',
                    'result' => 1,
                    'phone' => $request->number,
                    'refid' => $request->refid,
                    'status' => 0,
                ]);
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
                            CURLOPT_POSTFIELDS => array('code'=>$request->name, 'refid'=>$request->refid, 'amount'=>$bt->ramount,  'number' => $request->number),
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
                        $po =$bt->tamount  - $bt->ramount;

                        if ($success ==1){
                            $bo->status=1;
                            $bo->save();
                            $profit = profit::create([
                                'username' => $user->username,
                                'plan' => $bt->plan,
                                'amount' => $po,
                            ]);

                            $name= $bt->plan;
                            $am= "$bt->plan  was successful delivered to";
                            $ph= $request->number;


                            $receiver=$user->email;
                            $admin= 'admin@primedata.com.ng';

//                            Mail::to($receiver)->send(new Emailtrans($bo ));
//                            Mail::to($admin)->send(new Emailtrans($bo ));
                            Alert::success('Successful', $am.$ph);
                            return redirect('select');
                        }elseif ($success==0){
                            $zo=$user->wallet+$request->amount;
                            $user->wallet = $zo;
                            $user->save();

                            $name= $bt->plan;
                            $am= "NGN $request->amount Was Refunded To Your Wallet";
                            $ph=", Transaction fail";

                            Alert::error('Ooops..', $name.$am.$ph);
                            return redirect('select');

                        }


            }
        }



    }

}



