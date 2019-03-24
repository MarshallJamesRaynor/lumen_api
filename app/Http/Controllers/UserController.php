<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

class UserController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return UserResource
     */
    public function index(){
        return new UserCollection(User::paginate());
    }

    public function show($uuid){
        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);
        if($validator->passes()){
            return new UserResource(User::findByUuid($uuid));
        }else{
            return $validator->errors();
        }
    }


    public function create(){
        $user =  factory(User::class, 1)->create();
        return new ProductResource(User::findByUuid($user[0]->uuid));
    }


    public function store(Request $request){
    }

    public function update(Request $request){
    }

    public function destroy(Request $request){
    }
}
