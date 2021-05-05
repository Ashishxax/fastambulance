<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ambulance;
use App\Models\AmbulanceBooking;
use App\Models\AmbSearchRequest;
use DB;
use App\User;
use App\Helpers\Dashboard;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        
        $ambulance                   = Ambulance::count('id');
        $booking                       = AmbulanceBooking::count('id');
        $search                          = AmbSearchRequest::count('id');
        $location                       = Ambulance::count(DB::raw('DISTINCT pincode'));
        $users                            = User::where('id','!=',auth()->user()->id)->count('id');
        // $totalbooking = AmbulanceBooking::groupBy('pincode')->orderBy('pincode','desc')->take(3)->get()->toArray();
        // dd($totalbooking);
        $bookingCounting        = Dashboard::previous_month_data();
        $bkgCountCurrMonth  = Dashboard::current_month_data();
        $lastbooking                 = Dashboard::booking();
        $lastUser                       = Dashboard::user();
        $lastAmbulance            = Dashboard::ambulance();
        return view('admin.dashboard',compact('bookingCounting','bkgCountCurrMonth','ambulance','booking','search','location','users','lastbooking','lastUser','lastAmbulance'));
    }
    public function admin_users(){
        $users = User::where('id','!=',auth()->user()->id)->get();
        return view('admin.users',compact('users'));
    }
    public function ambulance(){
        $ambulances = Ambulance::paginate(5);
        return view('admin.manage_ambulance',compact('ambulances'));
    }
    public function get_record($id)
    {
        $records = Ambulance::where('id',$id)->get();
        return $records;
    }
    public function ambulance_form(Request $request){
        Ambulance::update_detail($request);
        return redirect()->back()->with('status_update', "Status Updated");
    }
}
