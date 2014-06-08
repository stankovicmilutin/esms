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
        <form class="form-horizontal" method="post" action="{{ URL::route('adminNewTournament')}}" enctype="multipart/form-data">
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
                 @if($errors->has('name'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('name') }}
                    </label>
                @endif 
                </div>
            </div>
            <div class="form-group">
                <label for="prize" class="col-lg-3 control-label">Prize poll</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="prize" placeholder="Total prize" name="prize" {{ (Input::old('prize')) ? ' value="'.e(Input::old('prize')).'"' : '' }} >
                @if($errors->has('name'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('prize') }}
                    </label>
                @endif 
                </div>
            </div>
            <div class="form-group">
                <label for="starts" class="col-lg-3 control-label">Starting</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="starts" placeholder="Starting date in 28-12-2014 format" required name="starting" {{ (Input::old('starting')) ? ' value="'.e(Input::old('starting')).'"' : '' }} >
                 @if($errors->has('starting'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('starting') }}
                    </label>
                @endif 
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-lg-3 control-label">Cover Image (1000x625)</label>
                <div class="col-lg-8">
                <input name="image" id="image" type="file" class="form-control" />
                    @if($errors->has('image'))
                    <label class="text-danger" for="image">
                        {{ $errors->first('image') }}
                    </label>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop