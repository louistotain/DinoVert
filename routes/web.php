<?php

use App\Http\Controllers\ArticlescategController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\NewsletterController;
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

Route::get('/', [PropertyController::class, 'latestproperties'])->name('public_index');

Route::get('/biens-a-vendre', [PropertyController::class, 'allproperties'])->name('biens_a_vendre');

Route::get('/biens-a-vendre/{property}', [PropertyController::class, 'detailsproperty'])->name('biens_a_vendre.details');

Route::post('/biens-a-vendre', [PropertyController::class, 'categproperties'])->name('biens_a_vendre.categ');


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

    Route::resource('tag_article', ArticleTagController::class, [
        'names' => [
            'index' => 'tag_article'
        ]
    ]);

    Route::post('tag_article', [ArticleTagController::class, 'sync'])->name('tag_article.sync');

});

Route::delete('Newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
Route::post('Newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');


//redirection url inconnues

Route::any('{query}',
    function () {
        return redirect('/');
    })
    ->where('query', '.*');
