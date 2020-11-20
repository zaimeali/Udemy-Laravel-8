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

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'has_comments' => false,
        'is_new' => true,
        'author' => 'zaime',
        'content' => 'Short Intro to laravel',
    ],
    2 => [
        'title' => 'Intro to PHP',
        'has_comments' => true,
        'is_new' => false,
        'author' => null,
        'content' => 'Short Intro to PHP',
    ],
    3 => [
        'title' => 'Intro to Blade',
        'has_comments' => true,
        'is_new' => false,
        'author' => 'zaime',
        'content' => 'Short Intro to Blade',
    ],
];

Route::get('/posts', function () use ($posts) {
    return view('posts.index', ['posts' => $posts]);
})->name('posts.index');

Route::get('/posts/{id?}', function ($id = 2) use ($posts) {

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})->name('posts.show');
