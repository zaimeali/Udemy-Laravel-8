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


// // Lecture 36
// Route::get('/fun/responses', function () use ($posts) {
//     return response($posts, 201)
//         ->header('Content-Type', 'application/json')
//         ->cookie('My_Cookie', 'Zaime', 3600);  // 3600 means expire after 1 hour
//         //(cookie_name, cookie_value, expiration_date) 
// });


// // Lecture 37
// Route::get('/fun/redirect', function () {
//     return redirect('/contact');
// });

// Route::get('/fun/back', function () {
//     return back();
// });

// Route::get('/fun/named-route', function () {
//     return redirect()->route('posts.index');
// });

// Route::get('/fun/named-route/{id}', function ($id) {
//     return redirect()->route('posts.show', ['id' => $id]);
// });

// Route::get('/fun/away', function () {
//     return redirect()->away('https://google.com');
// });


// // Lecture 38
// Route::get('/fun/json', function () use ($posts) {
//     return response()->json($posts);
// });


// // Lecture 39
// Route::get('/fun/download', function () {
//     return response()
//         ->download(
//             public_path('/favicon.ico'), 
//             'icon_name.ico'
//         );
// });


// Lecture 40
Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    // Lecture 36
    Route::get('/responses', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('My_Cookie', 'Zaime', 3600);  // 3600 means expire after 1 hour
            //(cookie_name, cookie_value, expiration_date) 
    })->name('response');


    // Lecture 37
    Route::get('/redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    Route::get('/back', function () {
        return back();
    })->name('back');

    Route::get('/named-route', function () {
        return redirect()->route('posts.index');
    })->name('named_route');

    Route::get('/named-route/{id}', function ($id) {
        return redirect()->route('posts.show', ['id' => $id]);
    })->name('named_route_param');

    Route::get('/away', function () {
        return redirect()->away('https://google.com');
    })->name('away');


    // Lecture 38
    Route::get('/json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');


    // Lecture 39
    Route::get('/download', function () {
        return response()
            ->download(
                public_path('/favicon.ico'), 
                'icon_name.ico'
            );
    })->name('download');
});