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


$router->group(['prefix' => 'api/v1','middleware'=>'auth'], function ($router) {
    $router->group(['prefix' => '/user'], function ($router) {
        $router->get('/create', 'UserController@create');
        $router->get('/',[
            'as' => 'user.index',
            'uses' => 'UserController@index'
        ]);
        $router->get('{uuid}',[
            'as' => 'user.show',
            'uses' => 'UserController@show'
        ]);

    });

    $router->group(['prefix' => '/product'], function ($router) {
        $router->get('/create', 'ProductController@create');
        $router->get('/',[
            'as' => 'product.index',
            'uses' => 'ProductController@index'
        ]);
        $router->get('{uuid}',[
            'as' => 'product.show',
            'uses' => 'ProductController@show'
        ]);
    });
    $router->group(['prefix' => '/order'], function ($router) {
        $router->post('/', [
            'middleware' => [
                'beforeOrder',
                'afterOrder'
            ],
            'uses'=>'OrderController@store'
        ]);
        $router->get('/', 'OrderController@index');
        $router->get('{uuid}','OrderController@show');

    });
});

$router->group(['prefix' => 'api/v2'], function ($router) {
    $router->group(['prefix' => '/user'], function ($router) {
        $router->post('/', 'UserController@store');
        $router->put('{uuid}', 'UserController@update');
        $router->delete('{uuid}', 'UserController@destroy');
    });
    $router->group(['prefix' => '/product'], function ($router) {
        $router->post('/', 'ProductController@store');
        $router->put('{uuid}', 'ProductController@update');
        $router->delete('{uuid}', 'ProductController@destroy');
    });
    $router->group(['prefix' => '/order'], function ($router) {
        $router->get('{uuid}','OrderController@show');
        $router->put('{uuid}', 'OrderController@update');
        $router->delete('{uuid}', 'OrderController@destroy');
    });
});






