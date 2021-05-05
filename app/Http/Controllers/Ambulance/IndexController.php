<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AmbulanceBooking;

class IndexController extends Controller
{
    public function ambulance_booking(Request $request){
        // AmbulanceBooking::bookAmbulance($request);
        AmbulanceBooking::bookAmbulanceDesktop($request);
        return redirect()->back()->with('booked_status', 'Ambulance has been book,You will get a call');
    }
}
