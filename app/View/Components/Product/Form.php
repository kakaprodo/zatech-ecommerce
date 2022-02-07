<?php

namespace App\View\Components\Product;

use App\Models\Discount;
use Illuminate\View\Component;

class Form extends Component
{

    public $discounts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->discounts = Discount::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.form');
    }
}
