<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlayerCard extends Component
{
    public $player;
    public $align;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($player, $align)
    {
        $this->player = $player;
        $this->align = $align;
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
