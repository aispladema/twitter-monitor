<?php

namespace App\Console\Commands;

use App\Events\NewTweetReceived;
use App\Tweet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use TwitterStreamingApi;

class ListenForGeotaggedTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:listen-for-tweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listen for Geotagged messages on Twitter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $caba = [-58.56159210205076, -34.70775131553936, -58.328475952148416, -34.52466147177175];
        TwitterStreamingApi::publicStream()
            ->whenFrom([$caba], function (array $tweet) {
                if($tweet['geo'] == null) return;
                $tweet = Tweet::create([
                    'tweet_id' => $tweet['id'],
                    'text' => $tweet['text'],
                    'user_id' => $tweet['user']['id'],
                    'latitude' => $tweet['geo']['coordinates'][0],
                    'longitude' => $tweet['geo']['coordinates'][1],
                    'timestamp' => $tweet['created_at']
                ]);
                event(new NewTweetReceived($tweet));
                dump("{$tweet['user']['screen_name']} tweeted {$tweet['text']}");
            })
            ->startListening();
    }
}
