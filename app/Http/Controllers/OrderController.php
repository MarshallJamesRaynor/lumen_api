<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;


class OrderController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return UserResource
     */
    public function show($uuid)
    {
        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);
        if($validator->passes()){
            return new UserResource(User::findByUuid($uuid));
        }else{
            return 'pippa';
        }

    }

    public function index()
    {
        UserResource::withoutWrapping();
        return new UserCollection(User::paginate());
    }

    public function store(Request $request)
    {
        UserResource::withoutWrapping();
        return new UserResource($request);
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
