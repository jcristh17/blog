<?php

namespace App\Livewire\Notifications;

use Livewire\Component;

class NotificationIndex extends Component
{
    public function render()
    {
        $user=auth()->user();
        $notifications=$user->notifications;
        return view('livewire.notifications.notification-index');
    }
}
