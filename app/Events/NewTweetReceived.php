<?php

namespace App\Events;

use App\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewTweetReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //protected $tweet;

    /**
     * Create a new event instance.
     *
     * @param Tweet $tweet
     */
    public function __construct(/*Tweet $tweet*/)
    {
        //$this->tweet = $tweet;
        Log::info('Broadcasting tweet!');
    }

    public function broadcastWith()
    {
        return [
            'data' => 'key'
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
