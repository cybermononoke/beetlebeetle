<?php

namespace App\Livewire\Centers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Center;

#[Layout('components.layouts.centers')]
#[Title('Center Dashboard')]

class CenterDashboard extends Component
{
    public $centers;

    public function mount()
    {
        $this->centers = $this->getCenters();
    }

    public function getCenters()
    {
        return Center::with('clients')->get();
    }

    public function render()
    {
        return view('livewire.centers.center-dashboard', [
            'centers' => $this->centers,
        ]);
    }
}
