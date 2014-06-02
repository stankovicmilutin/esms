@extends("template/main")

@section("page_title")
Login
@stop

@section("container")
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="formwrap well">
            <h2 class="notopmargin">Login</h2>
            <form role="form">
                <div class="form-group">
                    <label for="emailinput">Email address</label>
                    <input type="email" class="form-control" id="emailinput" name="emailinput" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwinput">Password</label>
                    <input type="password" class="form-control" id="pwinput" name="pwinput" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>
</div>
@stop

