<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbBookingRequest extends Model
{
    protected $table = 'ambulance_booking_request';
    protected $fillable = ['name','mobile','landmark','city'];

    public static function bookNotification($request){
        self::insert(array(
            'name'          => $request['name'],
            'mobile'       => $request['mobile'],
            'landmark'   => $request['landmark'],
            'city'            => $request['city'],
        ));
        return true;
    }
}
