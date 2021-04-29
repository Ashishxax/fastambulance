<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbSearchRequest extends Model
{
    protected $table = 'ambulance_search_request';
    protected $fillable = ['ambulance_booking_id','user_id'];

    public static function searchAmbulance($user_id){
        self::insert(array(
            'ambulance_booking_id'   => '',
            'user_id'                             => $user_id,
        ));
        return true;
    }
}
