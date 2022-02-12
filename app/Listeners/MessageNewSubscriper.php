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
     * Handle user login events.
     */
    public function handleMessage($event)
    {
        error_log('handleMessage .');
    }


    /**
     * Handle user login events.
     */
    public function restoreMessage($event)
    {
        error_log('restoreMessage .');
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        error_log('Some message here.');

        $events->listen(
            'Webklex\IMAP\Events\MessageNewEvent',
            'App\Listeners\MessageNewSubscriper@handleMessage'
        );
        $events->listen(
            'Webklex\IMAP\Events\MessageMovedEvent',
            'App\Listeners\MessageNewSubscriper@handleMessage'

        );
        $events->listen(
            'Webklex\IMAP\Events\MessageRestoredEvent',
            'App\Listeners\MessageNewSubscriper@restoreMessage'

        );
    }
}
