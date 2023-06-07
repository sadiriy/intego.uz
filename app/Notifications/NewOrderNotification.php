<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;
    
    protected $order;
    
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $notifiable->email = "sardorsadiriy@gmail.com";
        $order_details = json_decode($this->order->orderDetails);
        
        if (is_array($order_details) || is_object($order_details))
        {
            $order_info = "";
            foreach($order_details as $order_detail) {
                $product = $order_detail;
                $order_info = $order_info . $product . "\r\n";
            }
        }
        else{
            $order_info = $order_details;
        }
        
        return (new MailMessage)
                    ->subject('Новая заявка')
                    ->greeting('Здравствуйте')
                    ->line('Покупатель хочет оформить заявку')
                    ->line('Имя:' . $this->order->clientName)
                    ->line("Номер телефона:" . $this->order->clientPhone)
                    ->line('Товары:')
                    ->line($order_info)
                    ->line('Спасибо!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
