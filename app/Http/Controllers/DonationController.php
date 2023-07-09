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
            'firstName' => 'required',
            'lastName' => 'required',
            // 'companyName' => 'required',
            // 'email' => 'required|email',
            // 'phoneNumber' => 'required',
            // 'sex' => 'required',
            // 'paymentMethod' => 'required',
            // 'cardNumber' => 'required',
            // 'expiredDay' => 'required',
            // 'cvn' => 'required',
            // 'amount' => 'required'
        ]);

        if ($validator->passes()) {
            // Store Data in DATABASE from HERE 

            return response()->json(['success' => 'Thank you for your donation!']);
        }

        return response()->json(['error' => $validator->errors()]);
    }
}
