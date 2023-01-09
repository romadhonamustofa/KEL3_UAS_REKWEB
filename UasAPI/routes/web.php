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

$router->post('/mahasiswabaru', 'ControllerMahasiswaBaru@create');

$router->get('/mahasiswabaru', 'ControllerMahasiswaBaru@index');

$router->get('/detail/{id}', 'ControllerMahasiswaBaru@detail');

$router->put('/update/{id}', 'ControllerMahasiswaBaru@update');

$router->delete('/delete/{id}', 'ControllerMahasiswaBaru@delete');

$router->group(['middleware' => 'basicAuth'], function () use ($router) {
    $router->get('/mahasiswabaru', 'ControllerMahasiswaBaru@index');
  });