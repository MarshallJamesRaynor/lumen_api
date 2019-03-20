<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\Order;
use App\Http\Requests\OrderStoreRequest;


class OrderController extends BaseController
{

    public function index()
    {
        return 1;
    }

    public function store(OrderStoreRequest $request)
    {
       return $request->validated();
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
