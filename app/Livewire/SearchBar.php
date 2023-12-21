<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $isOpen = false;
    public $searchTerm = '';

    public function toggleSearch()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
