<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*\Illuminate\Support\Facades\DB::listen(function($query){
    var_dump($query->sql);
        //var_dump($query->bindings);
        //var_dump($query->time);
});*/

Route::get('/', function () {
    return view('welcome');
});


