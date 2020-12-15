<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $message;
    public $type;
    public $dismiss;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type, $dismiss)
    {
        $this->message = $message;
        $this->type = $type;
        $this->dismiss = $dismiss;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
