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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// routes Admin

Route::resource('articles_categories', ArticlescategController::class, [
    'names' => [
        'index' => 'articles_categories'
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

Route::resource('properties_categories', PropertiescategController::class, [
    'names' => [
        'index' => 'properties_categories'
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
