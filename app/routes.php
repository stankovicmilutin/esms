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
    
    // Edit player profile
    Route::get("player/{id}/edit", array(
        'as' =>"editPlayerProfile",
        'uses' => "PlayerController@editPlayerProfileView"
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

    // account settings
    Route::get('account-settings', array(
            'as' => "accountSettingsView",
            'uses' => "UserController@accountSettingsView"
    ));
    
    // CSRF prottection group
    Route::group(array('before' => 'csrf'), function() {
        
        Route::post('account-settings', array(
           'as' => "accountSettingsData",
           'uses' => "UserController@accountSettingsData"
        ));
        
        
    });
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
    
    Route::get('admin/tournament/new', array(
        "as" => "adminNewTournament",
        "uses" => "AdminController@newTournamentView"
    ));
    
    Route::post('admin/tournament/new',array(
       "as" => "adminNewTournament",
        "uses" => "AdminController@newTournamentData"
    ));
    
    Route::get('admin/tournament/all', array(
       "as" => "adminAllTournaments",
       "uses"=> "AdminController@allTournaments"
    ));

    Route::get('admin/tournament/{id}/edit', array(
        "as" => "adminEditTournament",
        "uses" => "AdminController@editTournamentView"
    ));

    Route::post('admin/tournament/{id}/save', array(
        "as" => "adminSaveTournament",
        "uses" => "AdminController@saveTournamentData"
    ));

    Route::get('admin/tournament/{id}/applies',array(
       "as" => "adminTournamentApplies",
       "uses" => "AdminController@tourApplies"
    ));
    
    Route::get('admin/tournament/{id}/startl',array(
       "as" => "adminStartTournamentLeague",
       "uses" => "AdminController@startTournamentLeague"
    ));

    Route::get('admin/tournament/{id}/startko',array(
       "as" => "adminStartTournamentKnock",
       "uses" => "AdminController@startTournamentKnock"
    )); 

    Route::get('admin/match/{id}/edit',array(
       "as" => "adminEditMatch",
       "uses" => "AdminController@editMatch"
    ));  

    Route::post('admin/match/{id}/saveinfo',array(
       "as" => "adminSaveMatchInfo",
       "uses" => "AdminController@saveMatchInfo"
    ));  
    Route::post('admin/match/{matchID}/{tourID}/savestats',array(
       "as" => "adminSavePlayerStats",
       "uses" => "AdminController@savePlayerStats"
    ));  
});



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
        
        Route::post("forgot/username",array(
            'as' => "forgot-username",
            'uses' => "UserController@forgotUsernameData"
        ));
        
        Route::post("forgot/password",array(
            'as' => "forgot-password",
            'uses' => "UserController@forgotPasswordData"
        ));
         
         Route::post('password-recovery/{link}',array(
            'as' => "password-recovery",
            'uses' => "UserController@passwordRecoveryData"
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
    
    Route::get('password-recovery/{link}',array(
       'as' => "password-recovery",
       'uses' => "UserController@passwordRecoveryView"
    ));
    
    Route::get('login', array(
    'as' => "loginView",
    'uses' => "UserController@loginView"
    ));
    
    Route::get("forgot/username",array(
        'as' => "forgot-username",
        'uses' => "UserController@forgotUsernameView"
    ));
    
    Route::get("forgot/password",array(
        'as' => "forgot-password",
        'uses' => "UserController@forgotPasswordView"
    ));
    
    
});


/*
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

/*
 *  Match routes
 */
Route::get("/matches", array(
    "as" => "matches",
    "uses" => "MatchController@matches"
));

Route::get('match/{id}',array(
    'as' => 'match',
    'uses' => "MatchController@match"
));

/*
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

/*
 *  Player routes 
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