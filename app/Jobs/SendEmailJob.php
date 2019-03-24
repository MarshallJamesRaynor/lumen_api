<?php

namespace App\Jobs;

use App\OrderState;
use Illuminate\Support\Facades\Mail;


class SendEmailJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $parameter;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->parameter = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle( )
    {

        Mail::send('emails.invoice', $this->parameter, function($message)
        {
            $message->to(['paolo.combi7@gmail.com',$this->parameter['email']]);
        });
        $orderState = OrderState::find( $this->parameter['order']->id);
        $orderState->setSendInvoice(true);
        $orderState->save();
    }
}
