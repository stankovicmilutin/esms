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

    public function loginView() {
        return View::make("users/login");
    }
    
    public function loginData(){
        
        $validator  = Validator::make(Input::all(), array(
            'username' =>'required',
            'password' =>'required'
        ));
        
        if ($validator->fails()){
            //redirect to login page
            return Redirect::route('loginView')
                    ->withErrors($validator);
        }
        else{
            // Login
            $remember = (Input::has("remember")) ? true : false ;
            $auth = Auth::attempt(array(
                'username' => input::get('username'),
                'password' => input::get('password'),
                'active' => 1
            ), $remember);
           
            if($auth){
                // Redirect to the intended page
                return Redirect::intended("/");
            }
        }
        // If all fails show notification
        return Redirect::route('loginView')
                ->with('global-title',"An error occured")
                ->with('global-text',"Wrong username/password combination or account not activated")
                ->with('global-class',"danger");
        
    }
    
    // registerView
    public function register() {
        return View::make("users/register");
    }

    // registerData
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
    
    public function activate($code) {
        
        $user = User::where('code','=',$code)->where('active','=',0);
        
        if($user->count()){
            $user = $user->first();
       
            // Set active to 1 
            $user->active = 1;
            $user->code = "";
            
            if($user->save()){
                
                /*
                 * Player create 
                */
                $player = Player::create(array('userID' => $user->userID ));
                
                return Redirect::route("index")
                        ->with('global-title','Your account has been activated!')
                        ->with('global-text','Welcome! </br> Your account is activated and your Player profile has been created. Please go and update them!')
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
    
    // signout
    public function signoutView(){
        Auth::logout();
        return Redirect::route("index");
    }
    
    public function accountSettingsView(){
        $user = Auth::user();
        return View::make("users/settings", array("user" => $user));
    }
    
    public function accountSettingsData(){
        $validator = Validator::make(Input::all(),array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_again' => 'required|same:new_password'
        ));
        
        if ($validator->fails()){
            return Redirect::route('accountSettingsView')
                    ->withErrors($validator);
        } 
        else {
           $user = User::find(Auth::user()->userID);
           
            $oldPassword = Input::get('old_password');
            $newPassword = Input::get('new_password');
        
            if(Hash::check($oldPassword,$user->getAuthPassword())){
                $user->password = Hash::make($newPassword);
                if($user->save()){
                    return Redirect::route("index")
                        ->with('global-title','Your password has been changed!')
                        ->with('global-text','You have changed your password')
                        ->with('global-class','success');
                }
                
            }
          
        }
        
        return Redirect::route("index")
                        ->with('global-title','Error')
                        ->with('global-text','Your password was not changed!')
                        ->with('global-class','danger');
    }
    
    public function forgotUsernameView(){
        return View::make("users/forgotUsername");
    }
    
    public function forgotUsernameData(){
        
        $email = Input::get('email');
        
        $checkUser = User::where("email", "=", $email);
        
        if($checkUser->count() == 1){
            $user = $checkUser->first();
            Mail::send('emails/forgotUsername',
                    array(
                        'username' => $user->username,
                        'link' => URL::route('loginView')
                    ),
                    function($message) use ($user){
                        $message->to($user->email,$user->username)->subject("Forgot username");
                    });
            
            return Redirect::route("forgot-username")
                        ->with('global-title','Username sent!')
                        ->with('global-text','We have sent you your username on your e-mail address. Please check your Inbox/Spam/Junk folders for it.')
                        ->with('global-class','success');
         
            
        }
        else{
            return Redirect::route("forgot-username")
                        ->with('global-title','Invalid e-mail')
                        ->with('global-text','There is no account with this e-mail!')
                        ->with('global-class','danger');
        }
        
        return Redirect::route("index")
                        ->with('global-title','Error')
                        ->with('global-text','You have encountered an error!')
                        ->with('global-class','danger');
    }
    
    public function forgotPasswordView(){
        return View::make("users/forgotPassword");        
    }
    
    public function forgotPasswordData(){
         $email = Input::get('email');
        
        $checkUser = User::where("email", "=", $email);
        
        if($checkUser->count() == 1){
            $user = $checkUser->first();
            
            $code = str_random(50);
            
            $user->code = $code;
            
            if($user->save()){           
            
            Mail::send('emails/forgotPassword',
                    array(
                        'username' => $user->username,
                        'link' => URL::route('password-recovery',$code)
                    ),
                    function($message) use ($user){
                        $message->to($user->email,$user->username)->subject("Password recovery");
                    });
            
            return Redirect::route("forgot-username")
                        ->with('global-title','E-mail has been sent!')
                        ->with('global-text','We have sent you e-mail with instructions to recover your password. Please check your e-mail inbox.')
                        ->with('global-class','success');
            }
            
        }
        else{
            return Redirect::route("forgot-password")
                        ->with('global-title','Invalid e-mail')
                        ->with('global-text','There is no account with this e-mail!')
                        ->with('global-class','danger');
        }
        
        return Redirect::route("index")
                        ->with('global-title','Error')
                        ->with('global-text','You have encountered an error! Your password was not changed!')
                        ->with('global-class','danger');
    }
    
    public function passwordRecoveryView($code){
        
        $userObj = User::where("code","=",$code);
        
        if($userObj->count() == 1){
            return View::make("users/newPassword",array("code" => $code));
        }
        
        return Redirect::route("index")
                        ->with('global-title','Error')
                        ->with('global-text','You have encountered an error! Your password was not changed!')
                        ->with('global-class','danger');
    }
    
    public function passwordRecoveryData($code){
        
        $validator = Validator::make(Input::all(), array(
            'username' => 'required',
            'new_password' => 'required|min:6',
            'repeat_new_password' => 'required|same:new_password'
        ));
        
        if($validator->fails()){
            return Redirect::route("password-recovery",$code)
                    ->withErrors($validator);
        }
        else{
            $user = User::where("code","=",$code)->first();
            
            if($user->username != Input::get('username')){
                return Redirect::route("password-recovery",$code)
                        ->with('global-title','Error')
                        ->with('global-text','Invalid username!')
                        ->with('global-class','danger');
            }
            else{
                $user->password = Hash::make(Input::get('new_password'));
                $user->code = "";
                if($user->save()){
                    return Redirect::route("loginView")
                        ->with('global-title','Password successfully changed!')
                        ->with('global-text','You have successfully changed your password, proceed to login now .')
                        ->with('global-class','success');
                }
                else{
                    return Redirect::route("index")
                        ->with('global-title','Error')
                        ->with('global-text','You have encountered an error! Your password was not changed!')
                        ->with('global-class','danger');
                }
                
            }
            
        }
        
    }
}
