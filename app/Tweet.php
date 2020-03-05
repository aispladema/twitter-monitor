<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['id', 'tweet_id', 'text', 'timestamp', 'user_id', 'latitude', 'longitude'];

    protected $casts = [
      'timestamp' => 'datetime'
    ];
}
