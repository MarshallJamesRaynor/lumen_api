<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Auth;
use App\Order;
use App\User;
use App\OrderState;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\Order as OrderResource;
use App\Services\OrderGeneratorService;
use App\Jobs\SendEmailJob;

class OrderController extends BaseController
{
    /**
     * @var OrderGeneratoServiceProvider
     */
    protected $orderGeneratorService;

    /**
     * ExampleController constructor.
     * @param NameService $nameService
     */
    public function __construct(OrderGeneratorService $orderGeneratorService){
        $this->orderGeneratorService = $orderGeneratorService;
    }


    public function index(){
        return new OrderCollection(Order::paginate());
    }

    public function show($uuid){
        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);
        if($validator->passes()){
            return new OrderResource(Order::findByUuid($uuid));
        }
    }


    public function store(Request $request){
        $order = $this->orderGeneratorService->make($request);
        $orderStatus =OrderState::create([
                'order_id'=> $order->id,
                'custom_email'=>$request['email'],
                'send_email'=> boolval($request['send_email']),
                'invoices_types'=>$request['format_invoice']
        ]);
        $data  = ['order' => $order, 'userdata'=>Auth::user()->addresses->random(), 'orderItems'=> $order->orderItems,'email'=>$request['email']];

        if($request['format_invoice'] =='html'){
            return view('emails.invoice', $data);
        }else{
            return new OrderResource($order);
        }

        if($request['send_email']) {
            dispatch(new SendEmailJob($data));
        }

    }



    public function update(Request $request){

    }

    public function destroy(Request $request){

    }

}
