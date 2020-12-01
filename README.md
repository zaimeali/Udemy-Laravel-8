## Constraints Params
1) use Where function after defining route to set the condition  (->where([ 'id' => '[0-9]+', ]))
2) or just go to RouteServiceProvider file and define in boot function
3) Route::pattern('id', '[0-9]+')


## Middleware
1) https://laravel.com/docs/8.x/middleware

## Helper Function
1) abort_if(!isset($posts[$id]), 404)  // with a status code

## Requests Inputs Options
1) https://laravel.com/docs/8.x/requests

## Migrations available column types
1) https://laravel.com/docs/8.x/migrations#available-column-types

## Collection Methods
1) https://laravel.com/docs/8.x/eloquent-collections#available-methods

## Factory and Query Builder
1) User::factory()->count(5)->create()
2) User::where('id', '>=', 2)->orderBy('id', 'desc')->get()

## Validation Rules
1) https://laravel.com/docs/8.x/validation#available-validation-rules

## Validation Rules in Custom Request
1) php artisan make:request StorePost
2) define validation in rules method

## Bootstrap
1) composer require laravel/ui
2) php artisan ui bootstrap
3) php artisan ui:controllers
4) npm i && npm run dev

## When in prod mod
1) npm run prod
2) in webpack file do mix.version()

## Testing
1) vendor\bin\phpunit
2) after setting up the testing dB env in phpunit.xml and config/database.php
3) php artisan config:clear
4) php artisan make:test HomeTest
5) php artisan make:test PostTest


## Collection
1) $posts = BlogPost::with('comments')->get() // will retrieve all comments
2) $posts = BlogPost::all()


## Lazy Loading
1) $post = BlogPost::findOrFail(3)
2) $post->comments

## Eager Loading


## DB Query Log
1) use Illuminate\Support\Facades\DB
2) DB::connection()->enableQueryLog()
3) some functions or lines of code
4) DB::getQueryLog()


## Create Comment and Post
1) $post = new BlogPost()
2) $post->title = "Nice Title"
3) $post->content = "Nice Content"
4) $post->save()
5) $comment = new Comment()
6) $comment->content = "Nice Comment"
7) $comment->blog_post_id = $post->id
8) $comment->save()


## Querying about isExistence in a dB
1) BlogPost::has('comments')->get()
2) BlogPost::has('comments', '>=', 2)->get()  // it will retrieve the post which have comments more or equal than 2
3) BlogPost::whereHas('comments', function ($query) { $query->where('content', 'like', '%ice%'); })->get()


## Querying if Doesn't Exist in a dB
1) BlogPost::doesntHave('comments')->get()
2) BlogPost::whereDoesntHave('comments', function ($query) { $query->where('content', 'like', '%abc%'); })->get()


## Querying Count in a dB
1) BlogPost::withCount('comments')->get()
2) BlogPost::withCount(['comments', 'comments as new_comments' => function ($query) { $query->where('created_at', '>=', '2020-12-01 08:41:38'); }])->get()