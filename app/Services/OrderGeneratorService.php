<?php
namespace App\Services;
use Auth;
use App\Order;

use DB;
use App\Product;

use Webpatser\Uuid\Uuid;
use App\Http\Requests\OrderStoreRequest;
use App\PriceAdjuster;
use App\CustomerBenefit;
use Illuminate\Support\Carbon;
class OrderGeneratorService extends PriceAdjuster
{
    public function make($request){

        if(Carbon::parse(Auth::user()->birthday)->isBirthday() ){
            $this->addCustomerBenefit(new CustomerBenefit(rand(1,100)) );
        }

        foreach ($request->product  as $productOrdered){
            $product = Product::findByUuid($productOrdered['uuid']);
            $this->addProduct($product,$productOrdered['quantity']);
        }

        if($this->saveOrder()){
            return $this->order;
        }else{
            return null;
        }
    }

    public function saveOrder(){
        DB::beginTransaction();
        try {

            $this->item->each(function ($item)  {
                $item->price = $item->price();
                $item->order_id = $this->order->id;
                $item->save();
            });
            $this->order->invoices_number = rand(0,99999);
            $this->order->invoices_data = Carbon::today();
            $this->order->save();

            DB::commit();
        } catch (QueryException $e) {
            DB::rollback();
        }
        return true;
    }



}
