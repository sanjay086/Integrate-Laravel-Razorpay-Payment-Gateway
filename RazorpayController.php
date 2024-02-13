<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
class RazorpayController extends Controller
{
    public $api;
    public function __construct($foo = null){
        $this->api = new Api("rzp_test_hoe8XYsG12LQM8", "UzmtmC8FwxXNPByRUx0PIpEr");
    }
    public function formPage(){
        return view("rpayment.payment");
    }
    public function makeOrder(Request $request){
        $this->validate($request,[
            'amount' => 'required|numeric',
        ]);

        $orderid = rand(111111,999999);
        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => ($request->get('amount') * 100), // 39900 rupees in paise
            'currency'        => 'INR',
            'notes'     =>  [
                'order_id' => $orderid,
            ],
        ];
        
        $razorpayOrder = $this->api->order->create($orderData);
        //dd($razorpayOrder);
        
        return view('rpayment.order_details',compact('orderid','razorpayOrder'));
    }
    public function success(Request $request){

        $status = $this->api->payment->fetch($request->get('payment_id'));
        //dd($status);
        if($status->status == "captured"){
            return redirect()->route('payment')->with('success','Payment Successfully Done');
        }
        return redirect()->route('payment')->with('failed','Payment failed');
    }
}
