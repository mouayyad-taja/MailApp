<?php

namespace App\Listeners;


class MessageNewSubscriper
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
     * Handle new message events.
     */
    public function messageNewEvent($event)
    {
        error_log('a new meassage sent .');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Webklex\IMAP\Events\MessageNewEvent',
            'App\Listeners\MessageNewSubscriper@messageNewEvent'
        );
    }
}
