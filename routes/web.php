<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlescategController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PropertiescategController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WysiwygController;
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


/*------------Client---------------*/

Route::get('/', [PropertyController::class, 'latestproperties'])->name('public_index');

Route::get('Newsletter/{token}', [NewsletterController::class, 'destroy']);

Route::post('Newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

Route::get('/biens-a-vendre', [PropertyController::class, 'allproperties'])->name('biens_a_vendre');
Route::get('/biens-a-vendre/{property}', [PropertyController::class, 'detailsproperty'])->name('biens_a_vendre.details');
Route::post('/biens-a-vendre', [PropertyController::class, 'categproperties'])->name('biens_a_vendre.categ');

Route::get('/actualites', [ArticleController::class, 'allactualites'])->name('actualites');
Route::get('/actualites/{article}', [ArticleController::class, 'detailsarticle'])->name('actualites.details');

Route::get('/qui-sommes-nous', function(){
    return view('client.qui_sommes_nous');
})->name('qui_sommes_nous');

Route::get('/conditions_utilisations', function(){
    return view('client.conditions_utilisations');
})->name('conditions_utilisations');

Route::get('/cookies', function(){
    return view('client.cookies');
})->name('cookies');

Route::get('/politique_confidentialite', function(){
    return view('client.politique_confidentialite');
})->name('politique_confidentialite');

Route::get('/contact', function(){
    return view('client.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::put('/wysiwyg/{wysiwyg}', [WysiwygController::class, 'update'])->name('wysiwyg.update');


/*------------JetStream---------------*/


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    return view('auth.register');
})->name('register');


/*------------Admin---------------*/


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
