<?php

namespace App\Notifications\Rating;

use App\Models\Complaint;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RatingComplaint extends Notification implements ShouldQueue
{
    use Queueable;


    protected $rating;
    protected $complaint;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Rating $rating, Complaint $complaint)
    {
        $this->rating = $rating;
        $this->complaint = $complaint;
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
        $channels[] = 'mail';
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
        $service = Service::findOrFail($this->rating->service_id);
        $url = config('services.frontUrl') . '/sto/' . $service->slug;

        return (new MailMessage)
            ->view(
                'emails.notifications.complaint.complaint',
                ['entity' => $this->rating, 'complaint' => $this->complaint, 'textTeam' => trans('auth.mail.team')  ]
            )
            ->greeting(trans('notification.complaint.title'))
            ->action(trans('notification.service.action'), $url);
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
