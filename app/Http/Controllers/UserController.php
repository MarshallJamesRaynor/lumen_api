<?php
/**
 * Name:  UserController
 * Project: Lamia OY Practical Task
 * @package    lamiassignment
 * Created: 23.03.2019*
 * Description: class used to manage user
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
use Laravel\Lumen\Routing\Controller as BaseController;

use Validator;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;
/**
 * UserController
 *
 * controller use to manage user API
 *
 * @package     lamiassignment
 * @category    Controllers
 * @author      Paolo Combi
 */
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

    /**
     * show
     *
     * Display the specified User.
     * @param  uuid $uuid
     * @return UserResource
     */
    public function show($uuid){
        $validator = Validator::make(['uuid' => $uuid],['uuid' => 'uuid']);
        if($validator->passes()){
            return new UserResource(User::findByUuid($uuid));
        }else{
            return $validator->errors();
        }
    }


    /**
     * create
     *
     * create and display a fake user
     *
     * @return ProductResource
     */
    public function create(){
        $user =  factory(User::class, 1)->create();
        return new ProductResource(User::findByUuid($user[0]->uuid));
    }



}
