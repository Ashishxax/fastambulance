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
}
