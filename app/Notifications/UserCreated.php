<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['mail', 'nexmo'];
        // return $notifiable->prefers_sms ? ['nexmo'] : ['mail', 'nexmo'];


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
                    ->subject('Welcome')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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

    // public function via($notifiable)
    // {
    //     return [SmsChannel::class];
    // }

    // public function toSms($notifiable)
    // {
    //     return (new SmsMessage())
    //         ->to($phoneNumber)
    //         ->content($content);
    // }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('Your SMS message content')
            ->from(config('services.nexmo.sms_from'));
    }
}
