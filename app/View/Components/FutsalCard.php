<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FutsalCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $futsal;
    public function __construct($futsal)
    {
        $this->futsal = $futsal;
        dd($futsal);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.futsal-card');
    }
}
