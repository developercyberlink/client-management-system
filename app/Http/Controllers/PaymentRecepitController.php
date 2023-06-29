<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentReceipt;
use App\Models\User;

class PaymentRecepitController extends Controller
{
    public function create(Request $request){
        $payment = PaymentReceipt::create([
            'user_id'=>$request->get("user_id"),
            'invoice_id'=>$request->get("invoice_id"),
            "amount"=>$request->get("amount")
        ]);
        $user = User::find($request->get("user_id"));
        // dd($user);
        $user->advance = $request->advance;
        $user->update();
        return back()->with('message','Payment Recepit created');
    }
}
