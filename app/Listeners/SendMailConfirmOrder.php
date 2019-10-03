<?php

namespace App\Listeners;

use App\Events\CustomerOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class SendMailConfirmOrder implements ShouldQueue
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
     * @param  CustomerOrder  $event
     * @return void
     */
    public function handle(CustomerOrder $event)
    {
        // gởi email cho người dùng
        //Mail::to($event->order->email)->send(new CustomerOrder($event->order));
        //dd($event);
        $data = array('name' => $event->order->name, 'email' => $event->order->email, 'body' => 'Welcome to our website.');
        Mail::send('mail.mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Welcome to our Website');
            $message->from('abc@gmail.com');
        });
    }
}
