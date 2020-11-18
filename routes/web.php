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

// Route::get('/posts/{id?}', function ($id = 2) {
//     return 'Blog Post ' . $id;
// })->where([
//     'id' => '[0-9]+',
// ])->name('posts.show');

Route::get('/posts/{id?}', function ($id = 2) {
    return 'Blog Post ' . $id;
})->name('posts.show');
