@extends("admin/main")

@section("page_title")
Dashboard
@stop

@section("content")
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Upcoming Matches</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover esmsTable">
                <tr>
                    <th>Host</th>
                    <th></th>
                    <th>Guest</th>
                    <th>Date</th>
                    <th>Phase</th>
                    <th>Tournament</th>
                    <th></th>
                </tr>
        @foreach($upcomingMatches as $match)
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

                    <td>{{ $match->tournament->name }}</td>
                    <td><a href="{{URL::Route('adminEditMatch', $match->matchID)}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                </tr>
        @endforeach
        </table>
        {{ $upcomingMatches->links() }}
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Latest 5 Matches</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover esmsTable">
                <tr>
                    <th>Host</th>
                    <th></th>
                    <th>Guest</th>
                    <th>Date</th>
                    <th>Phase</th>
                    <th>Tournament</th>
                    <th></th>
                </tr>
        @foreach($latestMatches as $match)
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

                    <td>{{ $match->tournament->name }}</td>
                    <td><a href="{{URL::Route('adminEditMatch', $match->matchID)}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                </tr>
        @endforeach
        </table>
    </div>
</div>


@stop