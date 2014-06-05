@if( Auth::user()->level == 5 ) 
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
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('index') }}">Back to Frontend</a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::route('signout')}}">Sign out</a></li>
                    </ul>
                </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
@endif