<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Stripe\Charge;
// use Stripe\Stripe;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class AccountController extends Controller
{


    public function stripe()
    {
        return view('payment.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $charge=Stripe\Charge::create ([
                "amount" =>100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from it" 
        ]);
      
        if ($charge->status == 'succeeded') {
           
           $userId = Auth::id();
           // $userId=1;
             DB::table('users')
            ->where('id', $userId)
            ->update(['is_active' =>1]);
            Session::flash('success', 'Payment successful!');
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['error' => 'Payment failed. Please try again.']);
        }
   
        return back();
    }
  
}
