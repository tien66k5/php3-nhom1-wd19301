<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CheckoutNotification extends Notification
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
            ->subject('Đặt hàng thành công')
            ->greeting('Xin chào ' . ($notifiable->name ?? 'bạn') . '!')
            ->line('Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.')
            ->line('Mã đơn hàng: #' . $this->order->id)
            ->line('Tổng tiền: ' . number_format($this->order->total_price, 0, ',', '.') . ' VNĐ')
            ->line('Địa chỉ giao hàng: ' . $this->order->addressName)
            ->action('Xem đơn hàng', route('orders.view', ['id' => $this->order->id]))
            ->salutation('Trân trọng, đội ngũ cửa hàng.');
    }
}
