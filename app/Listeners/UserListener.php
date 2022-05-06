<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class UserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::all()
        ->except($event->despliegue->id_usua)
        ->each(function(User $user) use($event){
            Notification::send($user, new UserNotification($event->despliegue));
        });
    }
}
