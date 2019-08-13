<?php

namespace Dois\Log\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogListener
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
       
        //adiciona se o usuário fez login ou logout na tabela de log
        activity()
            ->causedBy($event->user->id) //qual usuário fez a ação
            ->performedOn($event->subject) //de qual model foi feita a ação 
            ->log($event->description); //ação 
    }
}
