<?php
namespace App\Services;
use App\Order;
use Auth;

use DB;
use App\Product;
use App\Country;

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
            $country = Country::where('name',$request['country'])->get();
            $taxId =  Country::find($country[0]->id)->taxes()->first()->id;

            $this->addProduct($product,$productOrdered['quantity'],$taxId);
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
            $this->order->total_paid = $this->order->total();
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
