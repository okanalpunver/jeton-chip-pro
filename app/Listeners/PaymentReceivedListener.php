<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentReceivedListener
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
     * @param  PaymentReceived  $event
     * @return void
     */
    public function handle(PaymentReceived $event)
    {
        //
    }
}
