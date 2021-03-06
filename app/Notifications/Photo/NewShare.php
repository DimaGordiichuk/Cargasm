<?php

namespace App\Notifications\Photo;

use App\Http\Resources\AuthorResource;
use App\Models\Photo;
use App\Models\Share;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewShare extends Notification implements ShouldQueue
{
    use Queueable;

    protected $photo;
    protected $share;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Photo $photo, Share $share)
    {
        $this->photo = $photo;
        $this->share = $share;

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
        if ($notifiable->settings['event']['share']['email'] ?? false) {
            $channels[] = 'mail';
        };

        if ($notifiable->settings['event']['share']['site'] ?? false) {
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
        $url = url(config('services.frontUrl')  . '/gallery/photos' . $this->photo->id);

        return (new MailMessage)
            ->view(
                'emails.notifications.share',
                ['entity' => $this->photo,'user'=> $this->share->user]
            )
            ->greeting(trans('notification.photo.share.add'))
            ->action(trans('notification.photo.action'), $url)
            ->line(trans('notification.event.application.body'));
    }

    public function sendPushNotification($notifiable)
    {
        $url = env('FRONT_URL') . '/gallery/photos' . $this->photo->id;

        $firebaseToken = [$notifiable->device_token];
        $SERVER_API_KEY = config('services.fcm.key');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => trans('notification.photo.share.add'),
                "body" => trans('notification.photo.share.body'),
                "icon" => $this->share->user->getAllConversions()['avatar'],
                "action" => $url ,
                "user" => AuthorResource::make(User::where('id',$this->share->user_id)->first()),
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
    }

}
