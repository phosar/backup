<?php
// user and home routes

Route::get('/', [
    'uses' => 'HomeController@getHome',
    'as' => 'getHome'
]);

Route::get('/supplement/{id}', [
    'uses' => 'HomeController@getProductDetails',
    'as' => 'getProductDetails'
]);

Route::get('/supplement/category/{id}', [
    'uses' => 'HomeController@getCategoryProduct',
    'as' => 'getCategoryProduct'
]);

Route::get('/supplement/add/{id}', [
    'uses' => 'HomeController@getAddToCart',
    'as' => 'getAddToCart'
]);

Route::get('/supplement/reduce/{id}', [ 
    'uses' => 'HomeController@getReduceByOne',
    'as' => 'getReduceByOne'
]);

Route::get('/supplement/increase/{id}', [
    'uses' => 'HomeController@getIncreaseByOne',
    'as' => 'getIncreaseByOne'
]);

Route::get('/supplement/remove/{id}', [ 
    'uses' => 'HomeController@getRemoveItem',
    'as' => 'getRemoveItem'
]);


Route::group(['prefix' => 'user'], function () {

    Route::get('/cart', [ 
        'uses' => 'HomeController@getCart',
        'as' => 'getCart'
    ]);

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [
            'uses' => 'UsersController@getUserRegister',
            'as' => 'getUserRegister'
        ]);
        
        Route::post('/register', [
            'uses' => 'UsersController@postUserRegister',
            'as' => 'postUserRegister'
        ]);
        
        Route::get('/login', [
            'uses' => 'UsersController@getUserLogin',
            'as' => 'getUserLogin'
        ]);
        
        Route::post('/login', [
            'uses' => 'UsersController@postUserLogin',
            'as' => 'postUserLogin',
        ]);
        
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [
            'uses' => 'UsersController@getUserProfile',
            'as' => 'getUserProfile'
        ]);

        Route::get('/checkout', [  
            'uses' => 'HomeController@getCheckOut',
            'as' => 'getCheckOut'
        ]);
        
        Route::post('/checkout', [  
            'uses' => 'HomeController@postCheckOut',
            'as' => 'postCheckout'
        ]);
        
        Route::get('/logout', [
            'uses' => 'UsersController@getLogout',
            'as' => 'getUserLogout'
        ]);
    });
});

/////////////////// admin routes///////////////////
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [
            'uses' => 'Auth\HcpsLoginController@getAdminLogin',
            'as' => 'getAdminLogin'
        ]);
        
        Route::post('/login', [
            'uses' => 'Auth\HcpsLoginController@postAdminLogin',
            'as' => 'postAdminLogin'
        ]);
    });

    Route::get('/dashboard', [
        'uses' => 'HcpsController@dashboard',
        'as' => 'adminDashboard'
    ]);

    Route::get('/chart', [
        'uses' => 'HcpsController@getChart',
        'as' => 'getChart'
    ]);
    
    Route::get('/calendar', [
        'uses' => 'HcpsController@getCalendar',
        'as' => 'getCalendar'
    ]);
    
    Route::get('/product', [
        'uses' => 'HcpsController@getProduct',
        'as' => 'getProduct'
    ]);
    
    Route::post('/add', [
        'uses' => 'HcpsController@addProduct',
        'as' => 'addProduct'
    ]);
    
    Route::get('/orders', [
        'uses' => 'HcpsController@getOrders',
        'as' => 'getOrders'
    ]);
    
    Route::get('/users', [
        'uses' => 'HcpsController@getUsers',
        'as' => 'getUsers'
    ]);

    Route::get('/update', [
        'uses' => 'HcpsController@getAdmins',
        'as' => 'getAdmins'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'HcpsController@deleteProduct',
        'as' => 'deleteProduct'
    ]);
    
    Route::get('/logout', [
        'uses' => 'HcpsController@getLogout',
        'as' => 'getAdminLogout'
    ]);
});

Route::auth();

