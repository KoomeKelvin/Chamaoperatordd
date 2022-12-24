<?php

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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::post('/create_priority',     'App\Http\Controllers\PriorityController@store')->middleware(['auth:sanctum'])->name('create.priority');
Route::post('/posts',               'App\Http\Controllers\PostsController@store')->middleware(['auth:sanctum'])->name('create.post');
Route::patch('/posts/{post}',       'App\Http\Controllers\PostsController@update')->middleware(['auth:sanctum'])->name('update.post');
Route::delete('/posts/{post}',      'App\Http\Controllers\PostsController@destroy')->middleware(['auth:sanctum'])->name('delete.post');

// Duties 
Route::get('/duties/new',           'App\Http\Controllers\DutyController@create')->middleware(['auth:sanctum'])->name('create.duty');
Route::post('/duties',              'App\Http\Controllers\DutyController@store')->middleware(['auth:sanctum'])->name('store.duty');
Route::get('/duties/{duty}',        'App\Http\Controllers\DutyController@show')->middleware(['auth:sanctum'])->name('show.duty');
Route::patch('/duties/{duty}',      'App\Http\Controllers\DutyController@update')->middleware(['auth:sanctum'])->name('update.duty');
Route::get('/duties',               'App\Http\Controllers\DutyController@index')->middleware(['auth:sanctum'])->name('view.duties');
Route::get('/duties/{duty}/edit',   'App\Http\Controllers\DutyController@edit')->middleware(['auth:sanctum'])->name('edit.duty');
Route::delete('/duties/{duty}',     'App\Http\Controllers\DutyController@destroy')->middleware(['auth:sanctum'])->name('delete.duty');

//Reviews
Route::get('/reviews/new',          'App\Http\Controllers\ReviewsController@create')->middleware(['auth:sanctum'])->name('create.reviews');

Route::post('/post-reviews',        'App\Http\Controllers\PostReviewsController@store')->middleware(['auth:sanctum'])->name('store.post-reviews');
Route::post('/duty-reviews',        'App\Http\Controllers\DutyReviewsController@store')->middleware(['auth:sanctum'])->name('store.duty-reviews');

// Comments
Route::post('/post-comments',        'App\Http\Controllers\PostCommentsController@store' )->middleware(['auth:sanctum'])->name('store.post-comments');
Route::post('/duty-comments',        'App\Http\Controllers\DutyCommentsController@store' )->middleware(['auth:sanctum'])->name('store.duty-comments');

//statuses
Route::get('/duty-status',            'App\Http\Controllers\DutyStatusController@index')->middleware(['auth:sanctum'])->name('show.duty-status');
Route::post('/duty-status',           'App\Http\Controllers\DutyStatusController@store')->middleware(['auth:sanctum'])->name('store.duty-status');