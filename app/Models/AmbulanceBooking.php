<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    protected $table = 'ambulance_booking';
    protected $fillable = ['name','mobile','address','ip_address'];

    public static function bookAmbulance($request){
        self::insert(array(
            'name'          => $request['name'],
            'mobile'       => $request['number'],
            'address'      => $request['address'],
            'ip_address' => $request['ip'],
        ));
        return true;
    }
}
