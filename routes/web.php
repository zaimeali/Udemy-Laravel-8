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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

// Refactoring the above two routes
Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

// Route::get('/posts/{id?}', function ($id = 2) {
//     return 'Blog Post ' . $id;
// })->where([
//     'id' => '[0-9]+',
// ])->name('posts.show');

Route::get('/posts/{id?}', function ($id = 2) {
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'Short Intro to laravel',
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'Short Intro to PHP',
        ],
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})->name('posts.show');
