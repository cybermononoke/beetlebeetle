<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Layout('components.layouts.base')]
#[Title('Welcome')]
class Welcome extends Component
{
    public function render()
    {
        return view('livewire.welcome');
    }
}
