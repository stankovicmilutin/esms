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
                    <th>Date</th>
                    <th>Winner</th>
                    <th></th>
                </tr>
                @foreach ($matches as $match)
                 <tr>
                    <td><a href="{{URL::Route('team', $match->hostTeam->teamID)}}">{{ $match->hostTeam->name }}</a></td>
                    <td>vs</td>
                    <td><a href="{{URL::Route('team', $match->guestTeam->teamID)}}">{{ $match->guestTeam->name }}</a></td>
                    <td><a href="{{URL::Route('tournament', $match->tournament->tournamentID)}}">{{ $match->tournament->name }}</a></td>
                    <td>{{ date( "d M Y", strtotime($match->time)) }}</td>

                    @if ($match->winnerID == $match->hostTeam->teamID)
                    <td class="text-info">{{ $match->hostTeam->name }}</td>
                    @elseif ($match->winnerID == $match->guestTeam->teamID)
                    <td class="text-info">{{ $match->awayTeam->name }}</td>
                    @else
                    <td>Not Played</td>
                    @endif
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                @endforeach
            </table>

            {{ $matches->links() }}
        </div>

    </div>
</div>
@stop