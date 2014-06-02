<?php

class UserController extends BaseController {
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

    public function login() {
        return View::make("users/login");
    }

    public function register() {
        return View::make("users/register");
    }

    public function createAccount() {

        $validator = Validator::make(Input::all(), array(
                    'email' => "required|max:80|email|unique:users",
                    'username' => "required|max:80|min:4|unique:users",
                    'password' => "required|min:6",
                    'password_rep' => "required|same:password",
                        )
        );

        if ($validator->fails()) {
            return Redirect::route('register')
                    // Send errors
                    ->withErrors($validator)
                    // Send old inputs
                    ->withInput();
        }
        else {
            
            $username = Input::get('username');
            $email = Input::get('email');
            $password = Input::get('password');
            
            // Activation code
            $code = str_random(60);
            
            $user = User::create(array(
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'code' => $code,
                'active' => 0
            ));
            
            // Send email
            Mail::send('emails/activate', array('link' => URL::route('activate-account',$code),'username' => $username ), function($message) use ($user) {
                        $message->to($user->email, $user->username)->subject("Activate your account");
                    });
            
            
            // Show notification
            if($user){
                return Redirect::route("index")
                        ->with('global-title','Your account has been created!')
                        ->with('global-text','Please activate your account via email you have provided!')
                        ->with('global-class','success');
            }
            
        }
    }
    
    protected function activate($code) {
        
        $user = User::where('code','=',$code)->where('active','=',0);
        
        if($user->count()){
            $user = $user->first();
       
            // Set active to 1 
            $user->active = 1;
            $user->code = "";
            
            if($user->save()){
                
                /*
                 * Player create goes here
                */
                return Redirect::route("index")
                        ->with('global-title','Your account has been activated!')
                        ->with('global-text','Welcome! </br> Your account is activated and you can proceed to update your profile!')
                        ->with('global-class','success');
            }
            
        }
        else{
        
            return Redirect::route("index")
                ->with("global-title","You account was NOT activated")
                ->with("global-text","We could not activate your account, please contact support.")
                ->with("global-class","danger");
        }
        
    }
    
}
