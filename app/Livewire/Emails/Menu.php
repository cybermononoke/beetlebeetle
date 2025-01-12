<?php

namespace App\Livewire\Emails;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Exception;
use Mary\Traits\Toast;

class Menu extends Component
{
    use Toast;
    public string $selectedCategory = 'inbox';
    public $notificationCount;

    public function mount()
    {
        $this->notificationCount = $this->getNotifCount();
    }

    public function getNotifCount()
    {
        $notificationCount = DB::connection('sqlite')
            ->table('notifications')
            ->whereNull('read_at')
            ->count();

        return $notificationCount;
    }

    #[On('notificationRead')]
    public function updateNotifCount()
    {
        $this->notificationCount = $this->getNotifCount();
    }

    #[On('selectCategory')]
    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {
        return view('livewire.emails.menu', [
            'notificationCount' => $this->notificationCount
        ]);
    }
}