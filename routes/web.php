<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'api/v1'], function ($router)
{
    $router->get('/', function () use ($router) {
        $taxes =  App\Tax::find(1);
        $country =  App\Country::find(1);
        $country->taxes()->attach($taxes);
        return App\Tax::find(1);
    });

    $router->group(['prefix' => 'products'], function () use ($router) {
        $router->get('/', function ()    {
            // Matches The "/admin/users" URL
        });
    });
    $router->group(['prefix' => 'orders'], function () use ($router) {
        $router->get('/', function ()    {
            // Matches The "/admin/users" URL
        });
    });
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', function ()    {
            // Matches The "/admin/users" URL
        });
    });

});

