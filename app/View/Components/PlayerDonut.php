<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlayerDonut extends Component
{

    public $player;
    public $chartID;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($player, $chartID)
    {
        $this->player = $player;
        $this->chartID = $chartID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.player-donut');
    }
}
