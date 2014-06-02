<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-SMS | @yield('page_title')</title>

        <!-- Bootstrap -->
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/css.css'); }}

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        @include('template/nav')
                
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
            @yield('container')
        
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/scrollTo.js'); }}
    </body>
</html>