<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));


/*
 *  Authenticated group
 */

Route::group(array('before' =>"auth"),function(){
    /*
    *  Sign out
    */
    
    Route::get('sign-out', array(
       'as' => "signout",
       'uses' => "UserController@signoutView"
    ));
    
});




/*
 *  Unauthenticated group
 */
Route::group(array('before' => "guest"), function() {

    /*
     *  CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         *  Accept crate account form data
         */
        Route::post('register',array(
            'as' => "createAccount",
            'uses' => "UserController@createAccount"
        ));
        
        // Accept data for login
        Route::post('login', array(
            'as' => "loginData",
            'uses' => "UserController@loginData"
        ));
    });
    
    
    /*
     *  Display create account form
     */
    Route::get('register', array(
        'as' => "register",
        'uses' => "UserController@register"
    ));
    
    Route::get('activate/{code}',array(
        'as' => "activate-account",
        'uses' => "UserController@activate"
    ));
    
    
    Route::get('login', array(
    'as' => "loginView",
    'uses' => "UserController@loginView"
    ));
    
    
    
});


/**
 * player profile
 */
Route::get('player/{id}', array(
        'as' => "player-profile",
        'uses' => "PlayerController@showProfile"
    )); 
