@extends("template/main")

@section("page_title")
{{ $tournament->name }}
@stop

@section("container")
@if ($currentPlayer)
<div class="modal fade" id="apply">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Sign up for {{ $tournament->name }}</h4>
      </div>
      <div class="modal-body">
        <p>
            Are you sure you would like to apply your {{"[",$currentPlayer->getTeam()->tag,"] ", $currentPlayer->getTeam()->name  }}
            team for {{ $tournament->name}} ?
        </p>
      </div>
      <div class="modal-footer">
          <a href="{{ URL::route('applyForTournamentData',$tournament->tournamentID,"/apply")}}"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron tournCover" style="background-image: url({{ URL::asset('uploads/tournaments/'.$tournament->cover)}}); ">
            <div class="col-md-2 col-md-offset-11">
                @if ($currentPlayer)
                    @if ( $currentPlayer->isCaptain() )
                    <button data-toggle="modal" data-target="#apply" type="button" class="btn btn-success">Apply</button>
                    @endif
                @endif
            </div>
            <h1>{{ $tournament->name}}</h1>
            <p>Teams: {{ $tournament->max_teams }}</p>
            <p>Prize Money: ${{  number_format((int)$tournament->prizepool, 0, ',', ', ')   }}</p>
            <p>Starting on: {{ date("d. M Y", strtotime($tournament->starting))}}</p>

        </div>
        <div class="well">
            <h2 class="notopmargin">Standings</h2>

            <div class="tournamentPlayoff">
                <div class="panel panel-default matchBox">
                    <div class="panel-heading">Group A</div>
                    <div class="panel-body">
                        Team_1
                        Team_2
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
