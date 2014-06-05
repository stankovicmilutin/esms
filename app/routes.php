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

/**
 * 
 * AUTH ROUTES
 * 
 */
Route::group(array('before' =>"auth"),function(){
  
    Route::get('sign-out', array(
       'as' => "signout",
       'uses' => "UserController@signoutView"
    ));
    
    // Apply for tournament
    Route::get('/tournament/{id}/apply', array(
       'as' => "applyForTournamentData",
       'uses' => "TournamentController@applyTeam"
    ));
    
    // TEAM ROUTES 
    Route::get("teams/create",array(
       'as' => "createNewTeam",
       'uses' => "TeamController@createView"
    ));
    
    Route::post('teams/create', array(
        'as' => "createNewTeamData",
        'uses' => "TeamController@createData"
    ));
    
    Route::get('teams/edit/{id}',array(
        'as' => "editTeamView",
        'uses' => "TeamController@editView"
    ));
    
    Route::post('teams/edit/{id}',array(
        'as' => "editTeamData",
        'uses' => "TeamController@editData"
    ));

    Route::post('teams/edit/{id}/removeplayer',array(
        'as' => "removePlayerFromTeam",
        'uses' => "TeamController@removePlayer"
    ));

    Route::post('teams/edit/{id}/disband',array(
        'as' => "disbandTeamData",
        'uses' => "TeamController@disbandTeam"
    ));    

    Route::get('teams/leave',array(
        'as' => "leaveTeamData",
        'uses' => "TeamController@leaveTeam"
    ));    

    Route::get('teams/changecap/{id}-{teamid}',array(
        'as' => "changeCaptainData",
        'uses' => "TeamController@changeCaptain"
    ));    
    
    /**
     * PLAYER ROUTES
     */
    Route::get("player/my-invites",array(
       'as' => "my-invites",
       'uses' => "PlayerController@myInvitesView"
    ));
    
    Route::get("player/answer-invite/{id}/{answer}", array(
        'as' => 'answerInvitePlayer',
        'uses' => "PlayerController@answerInvite"
    ));
    

    //player settings save post
    Route::post('player-settings/save', array(
            'as' => "savePlayerSettings",
            'uses' => "PlayerController@saveSettingsData"
    ));

    //ajax search players
    Route::post('/ajax/playersearch', array(
            'as' => "playersLiveSearch",
            'uses' => "AjaxController@findPlayers"
    )); 

    //ajax send invite to player
    Route::post('/ajax/playerinvite', array(
            'as' => "playersLiveInvite",
            'uses' => "AjaxController@invitePlayer"
    )); 

    // Player settings
    Route::get('player-settings', array(
            'as' => "playerSettingsView",
            'uses' => "PlayerController@showPlayerSettings"
    )); 
});

/**
 * 
 * ADMIN ROUTES
 * 
 */
Route::group(array('before' => "admin"), function(){
    
    Route::get('admin/dashboard', array(
        "as" => "adminDashboard",
        "uses" => "AdminController@dashboard"
    ));
    
    Route::get('admin/new-tournament', array(
        "as" => "adminNewTournament",
        "uses" => "AdminController@newTournamentView"
    ));
    
    Route::post('admin/new-tournament',array(
       "as" => "adminNewTournament",
        "uses" => "AdminController@newTournamentData"
    ));
    
    Route::get('admin/all-tournaments', array(
       "as" => "adminAllTournaments",
       "uses"=> "AdminController@allTournaments"
    ));
    
});

/**
 * 
 * PUBLIC ROUTES
 * 
 */
Route::get('/', array(
    'as' => 'index',
    'uses' => 'HomeController@index'
));

/**
 *  Tournament routes 
 */
Route::get("/tournaments",array(
    "as" => "tournaments",
    "uses" => "TournamentController@allTournaments"
));

Route::get("/tournament/{id}",array(
    "as" => "tournament",
    "uses" => "TournamentController@tournament"
));


/**
 *  Match routes
 */
Route::get("/matches", array(
    "as" => "matches",
    "uses" => "MatchController@matches"
));


/**
 *  Team routes
 */
Route::get('teams',array(
    'as' => 'teams',
    'uses' => "TeamController@allTeams"
));

Route::get('team/{id}',array(
    'as' => 'team',
    'uses' => "TeamController@teamProfile"
));



/**
 * player routes 
 */
Route::get('player/{id}', array(
        'as' => "player-profile",
        'uses' => "PlayerController@showProfile"
)); 

// All players list
Route::get('players', array(
        'as' => "players",
        'uses' => "PlayerController@allTeams"
)); 


/**
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
