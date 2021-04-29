<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $table = 'ambulances';
    protected $fillable = ['user_id','address','pincode','city','state','latitude','longitude'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function sync_lat_long($request){
        $amb_data = self::find($request['id']);   
        if($amb_data['latitude'] != $request['latitude'])
            self::where('id',$request['id'])->update(array('latitude'=>$request['latitude'],'longitude'=>$request['longitude']));
        return true;
    }
}
