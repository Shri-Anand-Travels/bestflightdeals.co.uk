<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroBanner extends Component
{
    /**
     * @var mixed|null
     */
    public mixed $destination;
    /**
     * @var mixed|null
     */
    public mixed $iataDestination;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($destination = null, $iataDestination = null)
    {
        $this->destination = $destination;
        $this->iataDestination = $iataDestination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.hero-banner');
    }
}
