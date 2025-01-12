<?php

namespace App\Livewire\Centers;

use Livewire\Component;
use Livewire\Attributes\On;

class CenterMenu extends Component
{
    public string $selectedCategory = '';

    #[On('selectCategory')]
    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {
        return view('livewire.centers.center-menu');
    }
}
