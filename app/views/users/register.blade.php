@extends("template/main")

@section("page_title")
Register
@stop

@section("container")
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="formwrap well">
            <h2 class="notopmargin">Register</h2>
            <form role="form" method="post" action="{{ URL::route('register') }}">
                <div class="form-group">
                    <label for="usernameinput">Username:</label>
                    <input type="username" class="form-control" id="usernameinput" name="username" placeholder="Enter username" {{ (Input::old('username')) ? ' value="'.e(Input::old('username')).'"' : '' }} >  
                    @if($errors->has('username'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('username') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="emailinput">Email address</label>
                    <input type="email" class="form-control" id="emailinput" name="email" placeholder="Enter email" {{ (Input::old('email')) ? ' value="'.e(Input::old('email')).'"' : '' }} >
                    @if($errors->has('email'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('email') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="pwinput">Password</label>
                    <input type="password" class="form-control" id="pwinput" name="password" placeholder="Password">
                    @if($errors->has('password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('password') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="repwinput">Repeat Password</label>
                    <input type="password" class="form-control" id="repwinput" name="password_rep" placeholder="Repeat Password">
                    @if($errors->has('password_rep'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('password_rep') }}
                    </label>
                    @endif 
                </div>
                <button type="submit" class="btn btn-default">Register</button>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>

@stop