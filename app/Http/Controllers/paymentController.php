<?php

namespace App\Http\Controllers;
use Stripe;
use Stripe\Charge;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function paymentPost(Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is for testing purpose for SUC",
        ]);

        $charges = Charge::retrieve($charge->id);
        // Update the order model's payment status to 'successful'
        if ($charges->status === 'succeeded') {
            $order = order::find($request->id);
            $order->paymentStatus = 'Completed';
            $order->save();
            Session::flash('success','Payment successful. Thank you');
            return redirect()->route('myOrder');
        }
        
    }

    public function pay($id){
        $myorders = order::all()->where('id',$id);  
        return view('user\payment')
        ->with('orders',$myorders);
    }
}
