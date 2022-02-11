<?php

namespace App\View\Components\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\View\Component;

class Statistics extends Component
{
    public $usersCount = 0;
    public $productsCount = 0;
    public $purchasesCount = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->usersCount = User::count();
        $this->productsCount = Product::count();
        $this->purchasesCount = Purchase::count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.statistics');
    }
}
