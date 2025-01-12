<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMenu extends Component
{

    public string $selectedCategory = '';

    public function render()
    {
        return view('livewire.admin.admin-menu');
    }
}
