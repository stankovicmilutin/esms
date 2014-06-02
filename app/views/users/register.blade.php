@extends("template/main")

@section("page_title")
    Register
@stop

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="formwrap well">
                <h2 class="notopmargin">Register</h2>
                <form role="form" method="post" action="{{ URL::route('register') }}">
                    <div class="form-group">
                        <label for="usernameinput">Username:</label>
                        <input type="username" class="form-control" id="usernameinput" name="username" placeholder="Enter username" >                      
                    </div>
                    <div class="form-group">
                        <label for="emailinput">Email address</label>
                        <input type="email" class="form-control" id="emailinput" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pwinput">Password</label>
                        <input type="password" class="form-control" id="pwinput" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="repwinput">Repeat Password</label>
                        <input type="password" class="form-control" id="repwinput" name="password_rep" placeholder="Repeat Password">
                    </div>
                    <button type="submit" class="btn btn-default">Register</button>
                    {{ Form::token() }}
                </form>
            </div>
        </div>
    </div>
</div>
@stop