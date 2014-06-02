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
                <button type="submit" class="btn btn-default">Login</button>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>
</div>
@stop

