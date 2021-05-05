<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AmbulanceBooking;
use App\Models\AmbSearchRequest;
use App\Models\Ambulance;

class RequestController extends Controller
{
    public function booking_request(){
        $bookingrequest = AmbulanceBooking::orderBy('id', 'desc')->paginate(5);
        return view('admin.bookingRequest',compact('bookingrequest'));
    }
    public function user_search(){
        $amb_data = [];
        $searchRequest = AmbSearchRequest::select('user_id','created_at')->orderBy('user_id')->paginate(5);
        foreach($searchRequest as $value){
            $search_ambulance_data = Ambulance::where('user_id',$value['user_id'])->select('name','address')->get()->toArray();
            $amb_data['date'][]      = $value['created_at'];
            $amb_data['name'][]    = $search_ambulance_data[0]['name'];
            $amb_data['address'][] = $search_ambulance_data[0]['address'];
        }
        // $amb_data::pagination(5);
        // dd($amb_data);
        
        return view('admin.searchRequest',compact('amb_data'));
    }
}
