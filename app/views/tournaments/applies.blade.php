@extends("admin/main")

@section("page_title")
Tournament Applies
@stop

@section("content")
<?php
$i = 1;
$teamNum = count($teams);
?>
<div class="row">
    <div class="col-md-12">
        <div class="well">
            <h4 class="notopmargin">Tournament info</h4>
            There is space for {{ $tournament->max_teams - $teamNum == 1 ? $tournament->max_teams - $teamNum." team" : $tournament->max_teams - $teamNum." teams"   }} 
            more to apply for the {{ $tournament->name }}. </br>
            Tournament starts: {{ date( "d M Y", strtotime($tournament->starting)) }}
        </div>
        <div class="well">
            <h4 class="notopmargin">Tournament options</h4>
            @if ($tournament->reg_open == 1)
            <a href="{{ URL::route('adminStartTournament', $tournament->tournamentID) }}"><button type="button" class="btn btn-primary">Start tournament!</button></a>
            @else
            <a href=""><button type="button" class="btn btn-primary">Edit Matches</button></a>
            @endif            
            <a href="{{URL::Route('adminEditTournament', $tournament->tournamentID)}}"><button type="button" class="btn btn-primary" style="margin-left: 15px">Edit tournament</button></a>
            <a href="{{ URL::route('adminAllTournaments') }}"><button type="button" class="btn btn-primary" style="margin-left: 15px">All tournaments</button></a>
            <div class="panel-body">
                    <p>- Starting tournament will generate match schedule from applied teams and will close tournament applications.</p>
                    <p>- If there are not enough teams, random team will get free pass to next round (Knockout system only)</p>
            </div>
        </div>
        <div class="well well-sm">
            <h4>Applied Teams ( {{ $teamNum,"/",$tournament->max_teams}} ) for {{ $tournament->name}}</h4>
        </div>
        <table class="table">
            <tr><th>#</th><th>Tag</th><th>Team</th><tr/>
            @if ($teams)
            @foreach ($teams as $team)
            <tr>
                <th>{{ $i++ }}</th>
                <th>[{{$team->tag}}]</th>
                <th><a href="{{URL::Route('team', $team->teamID)}}">{{$team->name}}</a><th>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@stop