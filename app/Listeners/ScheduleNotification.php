<?php

namespace App\Listeners;

use App\Events\ScheduleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ScheduleNotification
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

    public function broadcastAs()
    {
    return 'server.created';
    }

    /**
     * Handle the event.
     *
     * @param  ScheduleEvent  $event
     * @return void
     */
    public function handle(ScheduleEvent $event)
    {
        return $event;
    }
}
