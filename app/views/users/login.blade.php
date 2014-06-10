@extends("template/main")

@section("page_title")
Login
@stop

@section("container")
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="formwrap well">
            <h2 class="notopmargin">Login</h2>
            <form role="form" action="{{ URL::route("loginData") }}" method="post">
                <div class="form-group">
                    <label for="usernameinput">Username</label>
                    <input type="username" class="form-control" id="usernameinput" name="username" placeholder="Enter username">
                    @if($errors->has('username'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('username')}}
                    </label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pwinput">Password</label>
                    <input type="password" class="form-control" id="pwinput" name="password" placeholder="Password">
                    @if($errors->has('password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('password')}}
                    </label>    
                    @endif
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label><a href="{{ URL::route('forgot-username') }}">Forgot username?</a></label><br>
                    <label><a href="{{ URL::route('forgot-password') }}">Forgot password?</a></label>
                </div>
                <button type="submit" class="btn btn-default">Login</button>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>
</div>
@stop

