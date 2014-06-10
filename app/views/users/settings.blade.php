@extends("template/main")

@section("page_title")
Account settings {{$user->username}}
@stop

@section("container")
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="well">
            <h3 class="notopmargin">Change password</h3>
            <form action="{{ URL::route('accountSettingsData') }}" method="post">
                <div class="form-group">
                    <label for="old-password">Old password:</label>
                    <input type="password" class="form-control" id="old-password" name="old_password" placeholder="Old password">
                    @if($errors->has('old_password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('old_password') }}
                    </label>
                    @endif 
                </div>
                <div class="form-group">
                    <label for="new-password">New password:</label>
                    <input type="password" class="form-control" id="new-password" name="new_password" placeholder="New password">
                    @if($errors->has('new_password'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('new_password') }}
                    </label>
                    @endif
                </div>
                <div class="form-group">
                    <label for="new-password-again">New password again:</label>
                    <input type="password" class="form-control" id="new-password-again" name="new_password_again" placeholder="Repeat new password">
                    @if($errors->has('new_password_again'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('new_password_again') }}
                    </label>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Change password</button>
                <a href="{{URL::previous()}}"><button type="button" class="btn btn-default">Back</button></a>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>
@stop

