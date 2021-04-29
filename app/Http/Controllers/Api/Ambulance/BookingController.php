<?php

namespace App\Http\Controllers\Api\Ambulance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Ambulance;
use App\Models\AmbulanceBooking;
use App\Models\AmbSearchRequest;
use App\Models\AmbBookingRequest;

class BookingController extends Controller
{
    public function bookingAmbulance(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'mobile' => ['required'],
            'landmark' => ['required'],
            'city' =>      ['required'],
        ]);
        if ($validator->fails()) {
            \Log::info("Validation error" . print_r($validator->errors(), 1));
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            // $user_info = auth()->user()->ambulance();   
            // AmbulanceBooking::bookAmbulance($request);
            $result = [];
            $client = new \GuzzleHttp\Client();
            $geocoder = new \Geocoder($client);
            $data = \Geocoder::getCoordinatesForAddress($request['landmark'], $request['city'], 'India');
            if($data['accuracy']!='result_not_found'){
                $latitude = $data['lat'];
                $longitude = $data['lng'];
                $ambulanceDetails = Ambulance::selectRaw('address,user_id,pincode,city,state,latitude,longitude, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( latitude ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
                ->having('distance', '<', 10)->orderByRaw('distance ASC')->get();
                // dd($ambulanceDetails);
                for($i=0; $i <count($ambulanceDetails); $i++){
                    // AmbSearchRequest::searchAmbulance($ambulanceDetails[$i]['user_id']);
                    $output[$i]['user_id'] = $ambulanceDetails[$i]['user_id'];
                    $output[$i]['address'] = $ambulanceDetails[$i]['address'];
                    $output[$i]['pincode'] = $ambulanceDetails[$i]['pincode'];
                    $output[$i]['city']        = $ambulanceDetails[$i]['city'];
                    $output[$i]['distance'] = round($ambulanceDetails[$i]['distance'],2).' km';
                }
                $result  = 
	    		[
					'status'                 => 200,
					'Message'                => "Successfully Data Passed",
					'data'                   => $output
				];

            }else{
                $result['status'] = 404; $result['msg'] = "We do not have service in this location";
                return $result;
            }
            return $result;
            
            

        }
    }
    public function notify_ambulance(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'name' => ['required'],
            'landmark' => ['required'],
            'city' =>      ['required'],
            'mobile' =>      ['required'],
        ]);
        if ($validator->fails()) {
            \Log::info("Validation error" . print_r($validator->errors(), 1));
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            AmbBookingRequest::bookNotification($request);
            return $response = ['status' => "Notification sent successfully"];
        }   
    }
}
