<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('register', ['uses' => 'UserController@create']);
    $router->post('login', ['uses' => 'UserController@login']);
    $router->post('profileupdate', ['uses' => 'UserController@update']);
    $router->get('brandList',  ['uses' => 'InventaryController@brandList']);
    $router->post('modelLists',  ['uses' => 'InventaryController@modelLists']);
    $router->post('inventaryadd',  ['uses' => 'InventaryController@create']);


});
