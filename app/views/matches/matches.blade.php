@extends("template/main")

@section("page_title")
Matches
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamHistory" class="well">
            <h2 class="notopmargin">All Matches</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr>
                    <th>Host</th>
                    <th></th>
                    <th>Guest</th>
                    <th>Tournament</th>
                    <th>Phase</th>
                    <th>Date</th>
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

                    <td><a href="{{URL::Route('tournament', $match->tournament->tournamentID)}}">{{ $match->tournament->name }}</a></td>
                    <td>{{ $match->tournament_phase }}</td>
                    <td>{{ date( "d M Y", strtotime($match->time)) }}</td>

                    @if ($match->hostTeam && $match->winnerID == $match->hostTeam->teamID)
                    <td class="text-info">{{ $match->hostTeam->name }}</td>
                    @elseif ($match->guestTeam && $match->winnerID == $match->guestTeam->teamID)
                    <td class="text-info">{{ $match->awayTeam->name }}</td>
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