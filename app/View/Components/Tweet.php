<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tweet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tweet;
    public function __construct(\App\Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tweet');
    }
}
