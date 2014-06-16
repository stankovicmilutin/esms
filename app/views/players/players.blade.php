@extends("template/main")

@section("page_title")
Players
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamHistory" class="well">
            <h2 class="notopmargin">All Teams</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Name</th><th>Country</th><th>Team</th><th>Position</th></tr>
                
                @foreach ($players as $player)
                <tr>
                    <td><a href="{{ URL::route('player-profile', $player->userID) }}">{{$player->nick}}</a></td>
                    <td>{{ $player->country }}</a></td>
                    @if ($player->teamID)
                    <td class="text-success"><a href="{{ URL::route('team', $player->teamID) }}">{{$player->teamName}}</a></td>
                    @else
                    <td class="text-danger">(no team)</td>
                    @endif
                    <td>{{$player->position}}</td>
                </tr>
                @endforeach
                
            </table>

            {{ $players->links() }}
            
        </div>

    </div>
</div>
@stop