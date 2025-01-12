<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Center;

#[Layout('components.layouts.admin')]
#[Title('Admin Dashboard')]


class AdminDashboard extends Component
{

    public $centers;

    public function mount()
    {
        $this->centers = $this->getCenters();
    }

    public function getCenters()
    {
        return Center::all();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'centers' => $this->centers,
        ]);
    }
}
