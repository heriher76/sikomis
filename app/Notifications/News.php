<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class News extends Notification
{
    use Queueable;
    
    public $item;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($item, $type)
    {
        $this->item = $item;
        $this->type = $type;
    }

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
        return (new MailMessage)
            ->markdown('vendor.notifications.email', ['item' => $this->item, 'type' => $this->type])
            ->from('humas@hmi-saintek.com')        
            ->line('HMI Komisariat Sains & Teknologi ada yang baru lagi nih! Semoga Rakanda dan Ayunda semuanya senang bisa membaca ini! Langsung cek ke official website HMI Komisariat Sains & Teknologi Ya! Saintek Go 4.0!')
            ->action('Klik Disini Untuk Membaca', url('/'.$this->item->slug))
            ->line('YAKIN USAHA SAMPAI!');
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
