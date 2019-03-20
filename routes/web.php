<?php



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


$router->group(['prefix' => 'api/v1'], function ($router) {
    $router->group(['prefix' => '/user'], function ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('{uuid}','UserController@show');
        $router->put('{uuid}', 'UserController@update');
        $router->delete('{uuid}', 'UserController@destroy');
    });

    $router->group(['prefix' => '/products'], function ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('{uuid}','UserController@show');
        $router->put('{uuid}', 'UserController@update');
        $router->delete('{uuid}', 'UserController@destroy');
    });
    $router->group(['prefix' => '/order'], function ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('{uuid}','UserController@show');
        $router->put('{uuid}', 'UserController@update');
        $router->delete('{uuid}', 'UserController@destroy');
    });




});



