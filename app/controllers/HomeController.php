<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{   
            //    Mail::send("emails/auth/email",array("name" => "Alex"), function($message){
            //           $message->to("lordmilutin@gmail.com","SOMETHING HERE")->subject("TEST EMAIL");
            //    });
		return View::make("template/main");
	}

       
}
