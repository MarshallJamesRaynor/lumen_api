<?php
/**
 * Name:  OrderGeneratorService
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: Services class
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
namespace App\Services;
use App\Order;
use Auth;

use DB;
use App\Product;
use App\Country;
use App\OrderState;

use App\Http\Requests\OrderStoreRequest;
use App\Library\PriceAdjuster;
use App\Library\CustomerBenefit;
use Illuminate\Support\Carbon;


/**
 * OrderGeneratorService
 *
 * class use to manage order generation and use the price logics
 * @package     lamiassignment
 * @category    Services
 * @author      Paolo Combi
 */
class OrderGeneratorService extends PriceAdjuster
{


    /**
     * make
     * function use to generate an order with a custom price logic
     * @param  mixed  $request
     * @return Order $order;
     */
    public function make($request){
        if(Carbon::parse(Auth::user()->birthday)->isBirthday() ){
            $this->addCustomerBenefit(new CustomerBenefit(rand(1,100)) );
        }

        foreach ($request->product  as $productOrdered){
            $product = Product::findByUuid($productOrdered['uuid']);
            $country = Country::where('name',$request['country'])->get();
            $taxId =  Country::find($country[0]->id)->taxes()->first()->id;

            $this->addProduct($product,$productOrdered['quantity'],$taxId);
        }

        if($this->saveOrder($request)){
            return $this->order;
        }else{
            return null;
        }
    }

    /**
     * saveOrder
     * function use to store the order in database.
     * in this function the  Transactions are to be used to ensure that the database is always in a consistent state.
     *
     *
     * @param  mixed  $request
     * @return Order $order;
     */
    public function saveOrder($request){
        DB::beginTransaction();
        try {

            $this->item->each(function ($item)  {
                $item->price = $item->price();
                $item->order_id = $this->order->id;
                $item->save();
            });
            $this->order->total_paid = $this->order->total();
            $this->order->invoices_number = rand(0,99999);
            $this->order->invoices_data = Carbon::today();
            $this->order->save();

            $orderStatus =OrderState::create([
                'order_id'=> $this->order->id,
                'custom_email'=>$request['email'],
                'send_email'=> boolval($request['send_email']),
                'invoices_types'=>$request['format_invoice']]
            );
            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
        }
        return true;
    }



}
