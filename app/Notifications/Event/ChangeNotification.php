<?php

namespace App\Notifications\Event;

use App\Http\Resources\AuthorResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $event;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $channels = [];

        if ($notifiable->settings['event']['change']['email'] ?? false) {
            $channels[] = 'mail';
        };

        if ($notifiable->settings['event']['change']['site'] ?? false) {
            $this->sendPushNotification($notifiable);
        }

        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(config('services.frontUrl') . '/events/' . $this->event->slug);

        return (new MailMessage)
            ->view(
                'emails.notifications.event.change',
                ['event' => $this->event,'user'=> $notifiable]
            )
            ->greeting(trans('notification.event.change'))
            ->action(trans('notification.event.action'), $url)
            ->line(trans('notification.event.status.title'));
    }

    public function sendPushNotification($notifiable)
    {

        $url = url(config('services.frontUrl') . '/events/' . $this->event->slug);

        $firebaseToken = [$notifiable->device_token];
        $SERVER_API_KEY = config('services.fcm.key');
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => trans('notification.event.change'),
                "body" => trans('notification.event.change'),
                "action" => $url,
                "user" => AuthorResource::make(User::where('id',$this->event->user_id)->first()),
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
//        dd($response);
    }
}
