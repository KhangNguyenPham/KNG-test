<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Donation;

class DonationController extends Controller
{
    /**
     * Show the donation form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('donation');
    }

    /**
     * Store a new guy's donation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'companyName' => 'required|string|max:100',
            'email' => 'required|string|max:50|email',
            'phoneNumber' => 'required|string|min:9|max:15',
            'sex' => 'required|string|in:male,female,others',
            'paymentMethod' => 'required|string|in:Visa,Mastercard,Amex',
            'cardNumber' => 'required|string|min:16|max:16',
            'expiredDay' => 'required|date|after:today',
            'cvn' => 'required|string|min:3|max:4',
            'amount' => 'required|numeric|between:0,1001'
        ]);

        if ($validator->passes()) {
            $donation = new Donation;
            
            $donation->first_name = strval(strip_tags($request->firstName));
            $donation->last_name = strval(strip_tags($request->lastName));
            $donation->company = strval(strip_tags($request->companyName));
            $donation->email = strval(strip_tags($request->email));
            $donation->phone_number = strval(strip_tags($request->phoneNumber));
            $donation->gender = strval(strip_tags($request->sex));
            $donation->payment_mode = strval(strip_tags($request->paymentMethod));
            $donation->amount = intval(strip_tags($request->amount));
            
            $donation->save();

            return response()->json(['success' => 'Thank you for your donation!']);
        }

        return response()->json(['error' => $validator->errors()]);
    }
}
