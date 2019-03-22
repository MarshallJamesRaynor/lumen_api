<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

use Webpatser\Uuid\Uuid;


class ProductController extends BaseController
{
    use \App\Traits\ErrorTraits;

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
            if($product = Product::findByUuid($uuid)){
                return new ProductResource($product);
            }else{
                return $this->customErrorFormat(
                    422,
                    '/data/uuid',
                    'Invalid Attribute',
                    'uuid you give not exist');
            }
        }else{
             return $this->customErrorFormat(
                422,
                '/data/uuid',
                'Invalid Attribute',
                'uuid you give is wrong');
        }

    }

    public function index(){
        return new ProductCollection(Product::paginate());
    }

    public function store(Request $request){
        return new ProductResource($request);
    }
    public function create(){
        $product = factory(Product::class, 1)->create();
        return new ProductResource(Product::findByUuid($product[0]->uuid));
    }

    public function update(Request $request){
    }

    public function destroy(Request $request){
    }
}
