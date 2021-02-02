<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentIntent;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use Illuminate\Support\Facades\Crypt;



class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $this->validate($request, [
            'amount'=> 'required|numeric|min:0.01'
        ]);
        /**
         * Here may call 3rd banking API to try to pay
         */
        // dd(Auth::user()->payment_intents);die;

        Auth::user()->payment_intents()->create([
            'payer_id'=> (Auth::user())->id,
            'payee_id'=> $request['payee_id'],
            'binded_payment_account_id' => $request['binded_payment_account_id'],
            'amount' => $request['amount']
        ]);
        session()->flash('success','Payment request submitted!');
        return redirect()->route('root');
    }

    public function create($hash = null){
        if($hash){
            $payee = UserRole::where('user_id', Crypt::decryptString($hash))->firstOrFail();
        }else{
            $payee = null;
        }

        return view('payments.create', compact('payee'));
    }
}
