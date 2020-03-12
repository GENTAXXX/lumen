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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('auth/login',
    [
        'user' => 'AuthController@authenticate'
    ]
);

$router->group(
    ['middleware' => 'jwt.auth'],
    function() use ($router) {
        $router->post('content', 'ContentController@store');
        $router->get('content', 'ContentController@index');
        $router->get('content/{id}', 'ContentController@show');
        $router->put('content/{id}', 'ContentController@update');
        $router->delete('content/{id}', 'ContentController@destroy');
    }
);

$router->post('user', 'UserController@store');
