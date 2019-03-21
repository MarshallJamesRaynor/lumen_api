<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\Order;
use App\Http\Requests\OrderStoreRequest;

use Webpatser\Uuid\Uuid;
class OrderController extends BaseController
{

    public function index()
    {
        return 1;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'country' => 'required|string|max:50',
            'format_invoice' => 'required|string|max:50',
            'sent_email' => 'required|boolean',
            'product.*.uuid' => 'required|uuid',
            'product.*.quantity' => 'required|numeric',
        ]);


        $order =  Order::create(['uuid'=>(string) Uuid::generate()]);
        $order->orderItems()->create([
            'product_id'=>1,
            'tax_id'=>1,
            'quantity'=>11,
            'price'=>1,
            'discounted_price'=>1,
            'taxes_price'=>1
        ]);

    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }
}
