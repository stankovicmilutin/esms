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
                    <li class="active"><a href="{{ URL::route('index') }}">Home</a></li>
                    <li><a href="#">Tournaments</a></li>
                    <li><a href="#">Teams</a></li>
                    <li><a href="#">Players</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li><a href="#">Hello, {{Auth::user()->username }}</a></li>
                    <li><a href="{{URL::route('signout')}}">Sign out</a></li>
                    @else
                        <li><a href="{{ URL::route('register') }}">Register</a></li>
                        <li><a href="{{ URL::route('loginView') }}">Login</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
