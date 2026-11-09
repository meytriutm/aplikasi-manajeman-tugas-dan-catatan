<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class TaskDeadlineNotification extends Notification
{
    public function __construct(public int $dueToday, public int $overdue) {}

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        $parts = [];
        if ($this->dueToday > 0) $parts[] = "{$this->dueToday} tugas deadline hari ini";
        if ($this->overdue > 0)  $parts[] = "{$this->overdue} tugas terlambat";

        return (new WebPushMessage)
            ->title('Pengingat NoteTask')
            ->body(implode(', ', $parts) . '.')
            ->data(['url' => '/dashboard']);
    }
}