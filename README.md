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