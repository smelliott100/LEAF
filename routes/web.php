<?php

use App\Data\Repositories\Dao\RecordsDao;
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

Route::get('/{visn}/records', function ($visn) {
    return view('records', ['records' => (new RecordsDao())->getAll()]);
})->where('visn', '^(?!api).+');

Route::get('/{visn}/records/{id}', function ($visn, $id) {
    return view('records', ['records' => (new RecordsDao())->getById($id)]);
})->where('visn', '^(?!api).+');

Route::get('/{visn}/records/{userID}/{submitted}/{search}', function ($visn, $userID, $submitted, $search) {
    return view('records', ['records' => (new RecordsDao())->complicatedStuff($userID, $submitted, $search)]);
})->where('visn', '^(?!api).+');