@extends("admin/main")

@section("page_title")
New Tournament
@stop

@section("content")
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Start New Tournament</h3>
    </div>
    <div class="panel-body">
        </br>
        <form class="form-horizontal" method="post" action="{{ URL::route('adminNewTournament')}}">
            <div class="form-group">
                <label for="max-teams" class="col-lg-3 control-label">Max teams</label>
                <div class="col-lg-8">
                    <select class="form-control" id="max-teams" style="cursor: pointer" name="max-teams">
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                        <option value="32">32</option>
                    </select>                   
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-lg-3 control-label">Type</label>
                <div class="col-lg-8">
                    <select class="form-control" id="type" style="cursor: pointer" name="type">
                        <option value="league">League system</option>
                        <option value="knockout">Knock-out system</option>
                    </select>                   
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="name" placeholder="Tournament name" required name="name" {{ (Input::old('name')) ? ' value="'.e(Input::old('name')).'"' : '' }} >
                </div>
            </div>
            <div class="form-group">
                <label for="prize" class="col-lg-3 control-label">Prize poll</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="prize" placeholder="Total prize" name="prize" {{ (Input::old('prize')) ? ' value="'.e(Input::old('prize')).'"' : '' }} >
                </div>
            </div>
            <div class="form-group">
                <label for="starts" class="col-lg-3 control-label">Starts</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="starts" placeholder="Starting date in 28/12/2014 format" required name="starts" {{ (Input::old('starts')) ? ' value="'.e(Input::old('starts')).'"' : '' }} >
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-4">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop