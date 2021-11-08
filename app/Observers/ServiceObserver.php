<?php

namespace App\Observers;

use App\Models\Event;
use App\Models\Post;
use App\Models\Service;
use App\Notifications\ServiceModerate;
use App\Notifications\ServiceModeratePublished;
use Illuminate\Support\Facades\Notification;

class ServiceObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(Service $service)
    {
        $user = $service->user;
        if ($service->isDirty('status')) {
            $new_status = $service->status;
            $old_status = $service->getOriginal('status');
            if ($new_status != $old_status) {
                if ($new_status === Service::SERVICE_PUBLISHED) {
                    Notification::send($user,new ServiceModeratePublished($service));
                    $service->notifies()->create([
                        'user_id' => $user->id,
                        'type' => trans('notification.services.published')
                    ]);
                }
            }
        }
    }

    /**
     * Handle the service "deleted" event.
     *
     * @param  \App\Service  $service
     * @return void
     */
    public function deleted(Service $service)
    {
        Post::where('author_type', 'App\Models\Service')->where('author_id', $service->id)->delete();
    }
}
