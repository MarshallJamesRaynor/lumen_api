<?php
/**
 * Name:  OrderController
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to manage the order
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
/**
 * OrderController
 *
 * controller that contain the logic of order and the api call
 *
 * @package     lamiassignment
 * @category    Controllers
 * @author      Paolo Combi
 */

class OrderController extends BaseController
{

    /**
     * @var OrderGeneratoServiceProvider
     */
    protected $orderGeneratorService;

    /**
     * OrderController constructor.
     *
     * function costructor use to instantate the service
     *
     * @param OrderGeneratorService $orderGeneratorService
     */
    public function __construct(OrderGeneratorService $orderGeneratorService){
        $this->orderGeneratorService = $orderGeneratorService;
    }


    /**
     * index
     *
     * function  return list of order paginated
     *
     * @return  OrderCollection
     */

    public function index(){
        return new OrderCollection(Order::paginate());
    }


    /**
     * show
     *
     * Display the specified Product.
     * @param  uuid $uuid
     * @return ProductResource
     */
    public function show($uuid){
        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);
        if($validator->passes()){
            return new OrderResource(Order::findByUuid($uuid));
        }
    }

    /**
     * store
     *
     * function used to store a new order and send back order and create a mail job
     *
     * @return mixed
     */
    public function store(Request $request){

        $order = $this->orderGeneratorService->make($request);
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


}
