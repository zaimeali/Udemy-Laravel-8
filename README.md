## Constraints Params
1) use Where function after defining route to set the condition  (->where([ 'id' => '[0-9]+', ]))
2) or just go to RouteServiceProvider file and define in boot function
3) Route::pattern('id', '[0-9]+')


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