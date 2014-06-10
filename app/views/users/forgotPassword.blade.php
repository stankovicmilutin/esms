@extends("template/main")

@section("page_title")
Forgot password
@stop

@section("container")
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="formwrap well">
            <h2 class="notopmargin">Forgot password</h2>
            <form role="form" action="{{ URL::route("forgot-password") }}" method="post">
                <p>Please enter your e-mail address and we will send you mail with instructions how to recover your password.</p>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
             
                <button type="submit" class="btn btn-primary">Send</button>
                <a href="{{URL::previous()}}"><button type="button" class="btn btn-default">Back</button></a>
                {{ Form::token() }}
            </form>
        </div>
    </div>
</div>
@stop

