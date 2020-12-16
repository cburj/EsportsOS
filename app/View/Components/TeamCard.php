<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TeamCard extends Component
{

    /**
     * Simply takes an array containing the details
     * for a single team. This is much easier than
     * passing single values each time!
     */
    public $team;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.team-card');
    }
}
