<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    protected $table = 'ambulance_booking';
    protected $fillable = ['name','mobile','landmark','city','pincode','ip_address'];

    public static function bookAmbulance($request){
        self::insert(array(
            'name'          => $request['name'],
            'mobile'       => $request['mobile'],
            'landmark'   => $request['landmark'],
            'city'             => $request['city'],
            // 'ip_address' => $request['ip'],
        ));
        return true;
    }
    public static function bookAmbulanceDesktop($request){
        
        self::insert(array(
            'name'          => $request['name'],
            'mobile'       => $request['number'],
            'landmark'   => $request['address'],
            'city'             => $request['city'],
            'ip_address' => $request['ip'],
        ));
        return true;
    }
}
