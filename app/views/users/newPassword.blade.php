@extends("template/main")

@section("page_title")
Forgot password
@stop

@section("container")
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="formwrap well">
            <h2 class="notopmargin">Password recovery</h2>
            <form role="form" action="{{ URL::route("password-recovery",$code) }}" method="post">
                <p>Please enter your username and new password</p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username" placeholder="Enter username">
                    @if($errors->has('username'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('username') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" class="form-control" id="password" name="new_password" placeholder="Enter new password">
                    @if($errors->has('new_password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('new_password') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="new-password">Repeat new password</label>
                    <input type="password" class="form-control" id="new-password" name="repeat_new_password" placeholder="Repeat new password">
                    @if($errors->has('repeat_new_password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('repeat_new_password') }}
                    </label>
                    @endif 
                </div>
                <button type="submit" class="btn btn-primary">Enter</button>
                <a href="{{URL::previous()}}"><button type="button" class="btn btn-default">Back</button></a>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>
@stop

