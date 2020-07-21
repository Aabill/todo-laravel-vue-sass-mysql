<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', 'TodosController@index');
Route::post('/todos', 'TodosController@add');
Route::post('/todos/remove', 'TodosController@rm');
Route::post('/todos/complete', 'TodosController@complete');
Route::get('todos/limit/{val}', 'TodosController@limit');
