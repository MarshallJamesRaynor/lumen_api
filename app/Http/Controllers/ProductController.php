<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;


class ProductController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return UserResource
     */
    public function show($uuid){

        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);

        if($validator->passes()){
            return new ProductResource(Product::findByUuid($uuid));
        }else{
            return 'pippa';
        }

    }

    public function index(){
        return new ProductCollection(Product::paginate());
    }

    public function store(Request $request){
        return new ProductResource($request);
    }

    public function update(Request $request){
    }

    public function destroy(Request $request){
    }
}
