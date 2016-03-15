<?php





Route::group(['middleware' => ['web']], function () {


    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    // Tasks Routes
    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destory');


    // //Authentication routes
    // Route::get('auth/login', 'Auth\AuthController@getLogin');
    // Route::post('auth/login', 'Auth\AuthController@postLogin');
    // Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // //Registration routes
    // Route::post('auth/login', 'Auth\AuthController@getRegister');
    // Route::post('auth/login', 'Auth\AuthController@postRegister');


    // Load Authentication and Registration routes -shortcut
    Route::auth();
});
