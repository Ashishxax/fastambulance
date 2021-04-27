<?php

namespace App\Http\Controllers\Api\Ambulance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BookingController extends Controller
{
    public function bookingAmbulance(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'mobile' => ['required'],
            'address' => ['required'],

        ]);
        if ($validator->fails()) {
            \Log::info("Validation error" . print_r($validator->errors(), 1));
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            // $user_info = auth()->user()->ambulance();   
            AmbulanceBooking::bookAmbulance($request);
        }
    }
    public function ambulance_booking_notify(Request $request){
        
    }
}
