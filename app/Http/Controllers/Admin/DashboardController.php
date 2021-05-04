<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ambulance;
    use App\Models\AmbulanceBooking;
use App\Models\AmbSearchRequest;
use DB;
use App\User;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $b = [];   $c=[]; $bookingCounting = [];  $bkgCountCurrMonth = [];
        $ambulance  = Ambulance::count('id');
        $booking      = AmbulanceBooking::count('id');
        $search         = AmbSearchRequest::count('id');
        $location      = Ambulance::count(DB::raw('DISTINCT pincode'));
        $users          =  User::where('id','!=',auth()->user()->id)->count('id');
        // $totalbooking = AmbulanceBooking::groupBy('pincode')->orderBy('pincode','desc')->take(3)->get()->toArray();
        // dd($totalbooking);
        // for previous month
        $datePrevStart = date("Y-n-j", strtotime("first day of previous month"));
        $datePrevEnd = date("Y-n-j", strtotime("last day of previous month"));
        $dateLimit = date('d', strtotime($datePrevEnd));
        for ($j = 1; $j <= $dateLimit; $j++) {
            $dateFrom = date('Y-m-' . $j . ' 00:00:00', strtotime($datePrevStart));
            $dateTo = date('Y-m-' . $j . ' 23:59:59', strtotime($datePrevEnd));
            
            $ambBooking = AmbulanceBooking::whereBetween('created_at', [$dateFrom, $dateTo])->count();
            $b[$j] = $ambBooking;
        }
        // for current month
        $date = time();
        $currentDateLimit = date('d', $date);
        for ($j = 1; $j <= $currentDateLimit; $j++) {
            $dateFrom = date('Y-m-' . $j . ' 00:00:00', time());
            $dateTo = date('Y-m-' . $j . ' 23:59:59', time());
            $ambBkgCurMonth = AmbulanceBooking::whereBetween('created_at', [$dateFrom, $dateTo])->count();
            $c[$j] = $ambBkgCurMonth;
            $bkgCountCurrMonth = $c;
        }
        
        $bookingCounting = [$b[1],$b[2],$b[3],$b[4],$b[5],$b[6],$b[7],$b[8],$b[9],$b[10],$b[11],$b[12],$b[13],$b[14],$b[15],$b[16],$b[17],
        $b[18],$b[19],$b[20],$b[21],$b[22],$b[23],$b[24],$b[25],$b[26],$b[27],$b[28],$b[29],$b[30]];
        $bkgCountCurrMonth = array_values($bkgCountCurrMonth);
        return view('admin.dashboard',compact('bookingCounting','bkgCountCurrMonth','ambulance','booking','search','location','users'));
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
