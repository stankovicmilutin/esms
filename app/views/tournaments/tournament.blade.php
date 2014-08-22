@extends("template/main")

@section ("extra-css")
{{ HTML::style('css/jquery.bracket.min.css'); }}
@stop

@section ("extra-js")
{{ HTML::script('js/jquery.bracket.min.js'); }}
@stop

@section("page_title")
{{ $tournament->name }}
@stop

@section("container")
@if ($currentPlayer != NULL)
<div class="modal fade" id="apply">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Sign up for {{ $tournament->name }}</h4>
      </div>
      <div class="modal-body">
        <p>
            @if ($currentPlayer->teamID != NULL)
                Are you sure you would like to apply your {{"[",$currentPlayer->getTeam()->tag,"] ", $currentPlayer->getTeam()->name  }}
                team for {{ $tournament->name}} ?
            @endif
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
        <div class="jumbotron tournCover" style="background-image: url({{ URL::asset('uploads/'.$tournament->cover)}}); ">
            <div class="col-md-10"><h1 class="notopmargin">{{ $tournament->name}}</h1>
                <p>Teams: {{ $tournament->max_teams }}</p>
                <p>Prize Money: ${{  number_format((int)$tournament->prizepool, 0, ',', ', ')   }}</p>
                <p>Starting on: {{ date("d. M Y", strtotime($tournament->starting))}}</p>
                <p>Format: {{ $tournament->type }}</p>
                @if ($tournament->winnerID)
                <p>Winner: <a href="{{URL::Route('team', $tournament->winnerID)}}">{{Team::find($tournament->winnerID)->name}}</a></p>
                @endif
                @if ($currentPlayer != NULL && $tournament->reg_open == 1)
                    @if ( $currentPlayer->isCaptain() )
                    <p><a data-toggle="modal" data-target="#apply" role="button" class="btn btn-success btn-lg" href="#">Apply for this Tournament</a></p>
                    @endif
                @endif
            </div>

            <div class="col-md-2">
                @if ($tournament->reg_open == 1)
                <p><span class="label label-info">Not started</span></p>
                @elseif ($tournament->winnerID)
                <p><span class="label label-info">Finished</span></p>
                @else
                <p><span class="label label-info">Playing</span></p>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="well">
            
            <h2 class="notopmargin">Standings</h2>
            @if($tournament->type == "League System")
            <table class="table table-hover esmsTable">
                <tr>
                    <th>Position</th>
                    <th>Team</th>
                    <th>Played</th>
                    <th>Won</th>
                    <th>Lost</th>
                </tr>
                <?php $c = 1; ?>
                @foreach ($teams as $team)
                <tr></tr>
                <tr>
                    <td>{{$c}}</td>
                    <td><a href="{{URL::Route('team', $team->teamID)}}">{{$team->name}}</a></td>
                    <td>{{$team->pivot->played}}</td>
                    <td>{{$team->pivot->won}}</td>
                    <td>{{$team->pivot->lost}}</td>
                </tr>
                <?php $c++; ?>
                @endforeach
            </table>
            @elseif ($tournament->reg_open == 0)
            @include('tournaments/treeview')
            @endif
            <div class="clearfix"></div>
        </div>

        <div class="well">
            <h2 class="notopmargin">Matches</h2>
            <table class="table table-hover esmsTable">
                <tr>
                    <th>Host</th>
                    <th></th>
                    <th>Guest</th>
                    <th>Date</th>
                    <th>Phase</th>
                    <th>Winner</th>
                    <th></th>
                </tr>
                @foreach ($matches as $match)
                 <tr>
                    @if ($match->hostTeam)
                    <td><a href="{{URL::Route('team', $match->hostTeam->teamID)}}">{{ $match->hostTeam->name }}</a></td>
                    @else 
                    <td>TBA</td>
                    @endif
                    <td>vs</td>
                    @if ($match->guestTeam)
                    <td><a href="{{URL::Route('team', $match->guestTeam->teamID)}}">{{ $match->guestTeam->name }}</a></td>
                    @else 
                    <td>TBA</td>
                    @endif

                    <td>{{ date( "d M Y", strtotime($match->time)) }}</td>
                    <td>{{ $match->tournament_phase }}</td>

                    @if ($match->hostTeam && $match->winnerID == $match->hostTeam->teamID)
                    <td class="text-info">{{ $match->hostTeam->name }}</td>
                    @elseif ($match->guestTeam && $match->winnerID == $match->guestTeam->teamID)
                    <td class="text-info">{{ $match->guestTeam->name }}</td>
                    @else
                    <td>Not Played</td>
                    @endif
                    @if ($match->hostTeam && ($match->guestTeam))
                    <td><a href="{{URL::Route('match', $match->matchID)}}"><button type="button" class="btn btn-info">View Details</button></a></td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
            </table>

            {{ $matches->links() }}
        </div>
    </div>
</div>
@stop
