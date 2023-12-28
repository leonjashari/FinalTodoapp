<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Header extends Component
{

    public $currentRoute;

    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function navigateTo($route)
    {
        $this->currentRoute = $route;
        return redirect()->route($route);
    }

    public function render()
    {
        return view('livewire.header');
    }
}
