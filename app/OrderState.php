<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model{

    protected $table = 'orders_state';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_id','custom_email','send_email','invoices_types'];

    public function  setSendInvoice($status){
        $this->send_invoice = $status;
    }
}
