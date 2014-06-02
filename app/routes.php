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

Route::get('login', array(
    'as' => "login",
    'uses' => "UserController@login"
));

Route::get('register',array(
    'as' => "register",
    'uses' => "UserController@register"
));


/*
 *  Unauthenticated group
 */
Route::group(array('before' => "guest"), function(){

    
    
});