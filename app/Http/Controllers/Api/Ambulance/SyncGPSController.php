<?php

namespace App\Http\Controllers\Api\Ambulance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ambulance;

class SyncGPSController extends Controller
{
    public function sync_ambulance_gps(Request $request){
        if($request['id']){
            Ambulance::sync_lat_long($request);
            return $response = ['status' => "Successfully synced coordinates"];
        }
    }
}
