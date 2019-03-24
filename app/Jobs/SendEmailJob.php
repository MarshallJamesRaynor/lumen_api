<?php
/**
 * Name:  SendEmailJob
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to manage mail dispacher
 *
 * Requirements: PHP5 or above
 * @package   lamiassignment
 * @author    Paolo Combi
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @since     Version 1.0.0
 * @filesource
 *
 *
 */

namespace App\Jobs;
use App\OrderState;
use Illuminate\Support\Facades\Mail;
/**
 * SendEmailJob
 *
 * job used to send mails containing billing information
 *
 * @package     lamiassignment
 * @category    Job
 * @author      Paolo Combi
 */


class SendEmailJob extends Job
{

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
