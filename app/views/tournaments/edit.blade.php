@extends("admin/main")

@section("page_title")
Edit Tournament
@stop

@section("content")
<?php $i=1; ?>
<div class="row">
    <div class="col-md-12">
        <div class="well well-sm">
            <h2 class="notopmargin">{{$tour->name}}</h2>
        </div>
    <div class="panel-body">
        </br>
        <form class="form-horizontal" method="post" action="{{URL::Route('adminSaveTournament', $tour->tournamentID)}}">
            <div class="form-group">
                <label for="name" class="col-lg-3 control-label">Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="name" placeholder="Tournament name" required name="name" value="{{$tour->name}}" >
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
                    <input type="text" class="form-control" id="prize" placeholder="Total prize" name="prize" value="{{$tour->prizepool}}" >
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
                    <input type="text" class="form-control" id="starts" placeholder="Starting date in 28-12-2014 format" required name="starting" value="{{$tour->starting}}" >
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
            @if ($tour->reg_open == 0)
            <div class="form-group">
                <label for="winner" class="col-lg-3 control-label">Winner</label>
                <div class="col-lg-8">
                    <select name="winner" id="winner" class="form-control">
                        <option value="-1" @if (!$tour->winnerID) selected @endif>None</option>
                        @foreach ($teams as $team)
                            <option value="{{$team->teamID}}" @if ($tour->winnerID == $team->teamID) selected @endif >{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{URL::previous()}}"><button type="button" class="btn btn-default">Back</button></a>
                </div>
            </div>
        </form>
    </div>

    </div>
</div>

@stop