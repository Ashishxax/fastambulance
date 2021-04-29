<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;
use App\Models\Ambulance;

class WebsocketEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $somedata;

     
    public function __construct($somedata)
    {
        $this->somedata = $somedata;
    }

    public function broadcastOn()
    {
        // if($request['id']){
        //     Ambulance::sync_lat_long($request);
        // }
        return new Channel('DemoChannel');
    }
}
