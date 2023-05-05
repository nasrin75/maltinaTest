<?php

namespace App\Notifications;

use App\Channels\SmsChannel;
use App\Models\CashBackGroup;
use App\Models\Notification as NotificationModel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportOrderStatusNotification extends Notification
{
    use Queueable;

    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return 'mail';
    }

    public function toMail($notifiable)
    {
        if (!empty($notifiable->email)) {
            return (new MailMessage())
                ->subject('وضعیت سفارش تغییر یافت')
                ->markdown('emails.user.send_mail',
                    [
                        'name' => $notifiable->name,
                        'content' => 'سفارش شما به وضعیت '.$this->status.' تغییر بافت ',
                    ]
                );
        }
    }
}
