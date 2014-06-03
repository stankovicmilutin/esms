<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | @yield('page_title')</title>

        <!-- Bootstrap -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/style.css'); }}

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        @include('admin/nav')

        <div class="container">
            @if( Session::has('global-text'))            
            <div class="panel panel-{{ Session::get('global-class') }}">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ Session::get('global-title') }}</h3>
                </div>
                <div class="panel-body">
                    {{ Session::get('global-text') }}
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 250px; background-color:#222222; border-radius: 5px">
                        <li><a href="{{ URL::route('adminDashboard') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Tournament <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::route('adminAllTournaments') }}">All Tournaments</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::route('adminNewTournament') }}">+ New Tournament</a></li>
                            </ul>
                        </li>
                        <li class="disabled"><a href="#">Disabled</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    @yield('content')
                </div>
                <div class="col-md-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Total teams</h3>
                        </div>
                        <div class="panel-body">
                            2,583
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Total players</h3>
                        </div>
                        <div class="panel-body">
                            16,232
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Total matches</h3>
                        </div>
                        <div class="panel-body">
                            5,322
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js'); }}
    </body>
</html>