<?php
// app/Notifications/OrderCancelledNotification.php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCancelledNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Thông báo hủy đơn hàng')
                    ->greeting('Xin chào ' . ($notifiable->name ?? 'bạn') . '!')
                    ->line('Đơn hàng của bạn với mã số #' . $this->order->id . ' đã bị hủy.')
                    ->line('Trạng thái đơn hàng: Đã hủy')
                    ->salutation('Trân trọng, đội ngũ hỗ trợ!');
    }
}
