<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ambulance;

class AmbSearchRequest extends Model
{
    protected $table = 'ambulance_search_request';
    protected $fillable = ['ambulance_booking_id','user_id'];

    public function ambulance_search(){
        return $this->hasOne(Ambulance::class);
    }

    public static function searchAmbulance($user_id){
        self::insert(array(
            'ambulance_booking_id'   => '',
            'user_id'                             => $user_id,
        ));
        return true;
    }
}
