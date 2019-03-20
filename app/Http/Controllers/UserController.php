<?php

namespace App\Http\Controllers;
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

use Illuminate\Support\Facades\Mail;

class UserController extends BaseController
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

    public function testEmail(){
        Mail::raw('ciao ', function($msg) { $msg->to(['p.combi84@gmail.com']); });
        return '1';
    }
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    public function store(Request $request)
    {
        return new UserResource($request);
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
