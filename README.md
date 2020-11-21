## Constraints Params
1) use Where function after defining route to set the condition  (->where([ 'id' => '[0-9]+', ]))
2) or just go to RouteServiceProvider file and define in boot function
3) Route::pattern('id', '[0-9]+')


## Helper Function
1) abort_if(!isset($posts[$id]), 404)  // with a status code

## Requests Inputs Options
1) https://laravel.com/docs/8.x/requests