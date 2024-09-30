<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class LiveStream implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $type;
    public $teacherId;

    public function __construct($type, $teacherId)
    {
        $this->type = $type;
        $this->teacherId = $teacherId;
    }

    public function broadcastOn()
    {
        return new Channel('live-stream');
    }

    public function broadcastAs()
    {
        return 'live-stream-event';
    }
}
