<?php

namespace App\Listeners;

use App\Events\NewUserHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNewUserMailable;

class NotifyAdminViaEmailListener implements ShouldQueue
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
     * @param 
     * @return void
     */
    public function handle( $event)
    {
      
        Mail::to('samutt90@gmail.com')->send(new AdminNewUserMailable($event->user));
    }
}
