<?php

use App\Http\Controllers\ArticlescategController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PropertiescategController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TagController;
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
})->name('public_index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    return view('auth.register');
})->name('register');


// routes Admin

//resources location
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified']], function () {


Route::resource('articlescategs', ArticlescategController::class, [
    'names' => [
        'index' => 'articlescategs'
    ]
]);

Route::resource('articles', ArticleController::class, [
    'names' => [
        'index' => 'articles'
    ]
]);

Route::resource('pictures', PictureController::class, [
    'names' => [
        'index' => 'pictures'
    ]
]);

Route::resource('propertiescategs', PropertiescategController::class, [
    'names' => [
        'index' => 'propertiescategs'
    ]
]);

Route::resource('properties', PropertyController::class, [
    'names' => [
        'index' => 'properties'
    ]
]);

Route::resource('tags', TagController::class, [
    'names' => [
        'index' => 'tags'
    ]
]);

});


//redirection url inconnues

Route::any('{query}',
    function () {
        return redirect('/');
    })
    ->where('query', '.*');
