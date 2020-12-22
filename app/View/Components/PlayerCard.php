<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlayerCard extends Component
{
    public $player;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($player)
    {
        $this->player = $player;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.player-card');
    }
}
