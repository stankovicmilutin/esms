<div id="" class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">eSports Management System</a>
        </div>
        <div id="navbar-main" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('index') }}">Home</a></li>
                <li><a href="{{ URL::route('tournaments') }}">Tournaments</a></li>
                <li><a href="{{ URL::route('teams') }}">Teams</a></li>
                <li><a href="{{ URL::route('players') }}">Players</a></li>
                <li><a href="{{ URL::route('matches') }}">Matches</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                     <?php
                        $player = Auth::user()->player;
                        $player->getInvites();
                    ?>
                    @if ( count($player->invites) > 0 )
                    <li><a href="{{ URL::route('my-invites') }}">Invites( {{ count($player->invites) }} )</a></li>
                    @endif
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('player-profile', Auth::user()->userID) }}">My Profile</a></li>
                        @if (Auth::user()->player->teamID)
                        <li><a href="{{ URL::route('team', Auth::user()->player->teamID) }}">My Team</a></li>
                        @else
                        <li><a href="{{ URL::route('createNewTeam') }}">My Team</a></li>
                        @endif
                        <li><a href="{{ URL::route('playerSettingsView') }}">Account Settings</a></li>
                        <li class="divider"></li>
                        @if( Auth::user()->level == 5 )
                        <li><a href="{{ URL::route('adminDashboard') }}">Admin Dashboard</a></li>
                        @endif
                        <li class="divider"></li>
                        <li><a href="{{URL::route('signout')}}">Sign out</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ URL::route('register') }}">Register</a></li>
                <li><a href="{{ URL::route('loginView') }}">Login</a></li>
                @endif

            </ul>
        </div><!--/.nav-collapse --> 
    </div>
</div>
