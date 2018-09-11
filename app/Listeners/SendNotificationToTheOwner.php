<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner
{

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;
        Mail::send('emails.contact',['msg' => $message],function($m) use($message){
         //dd($message);
         $m->from($message->email, $message->name)
           ->to('vieyrapez@gmail.com','Pablo')
           ->subject('Tu mensaje fue recibido');
        });
    }
}
