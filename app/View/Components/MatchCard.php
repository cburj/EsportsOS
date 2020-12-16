<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MatchCard extends Component
{

    public $matchup;
    public $verbose;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($matchup, $verbose)
    {
        $this->matchup = $matchup;
        $this->verbose = $verbose;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.match-card');
    }
}
