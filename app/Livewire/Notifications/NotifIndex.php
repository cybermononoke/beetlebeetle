<?php

namespace App\Livewire\Notifications;

use Livewire\Component;
use App\Models\Notification;
use Mary\Traits\Toast;
use Carbon\Carbon;

class NotifIndex extends Component
{
    use Toast;

    public $notifications;

    public function mount()
    {
        $this->notifications = Notification::with(['center', 'client'])->get();
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            try {
                $notification->update(['read_at' => Carbon::now()]);
                $this->notifications = Notification::with(['center', 'client'])->get();
                $this->success('Notification marked as read');
            } catch (\Exception $e) {
                $this->error('Error updating notification');
            }
        } else {
            $this->error('Notification not found');
        }
    }

    public function deleteNotification($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            try {
                $notification->delete();
                $this->notifications = Notification::with(['center', 'client'])->get();
                $this->success('Notification deleted successfully');
            } catch (\Exception $e) {
                $this->error('Error deleting notification');
            }
        } else {
            $this->error('Notification not found');
        }
    }


    public function render()
    {
        return view('livewire.notifications.notif-index', [
            'notifications' => $this->notifications,
        ]);
    }
}
