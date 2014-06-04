@extends("template/main")

@section("page_title")
{{ $team->name }}
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamInfo" class="well">
            <div class="col-md-2">
                @if ($team->avatar)
                    <img src="{{ asset('uploads') . '/' . $team->avatar }}" alt="{{ $team->name }}" class="img-rounded" width="140">
                @else
                    <img src="{{ asset('img/anonteam.jpg') }}" alt="No photo yet!" class="img-rounded" height="140">
                @endif
            </div>
            <div class="col-md-8">
                <h2>[{{ $team->tag }}] {{ $team->name }}</h2>
                <p>{{ $team->about }}</p>
            </div>
            <div class="col-md-2">
                <!-- check if current player is memer of this team -->
                @if ($player->teamID == $team->teamID)
                <ul class="nav nav-pills">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Team Options</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @if ($captain)
                            <li><a href="{{ URL::route('editTeamView', $team->teamID) }}">Edit team</a></li>
                            @endif
                            <li><a href="#" data-toggle="modal" data-target="#invite-players">Invite players</a></li>
                            <li><a href="#">Change captain</a></li>
                            <li><a href="#">Leave team</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Disband team</a></li>
                        </ul>
                    </div>              
                </ul>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="spacer50"></div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-flag"></i>Country: </td>
                        <td>{{$team->country}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-calendar"></i>Website: </td>
                        <td>{{$team->website}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-trophy"></i>Top Result: </td>
                        <td>TI1 Winner</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-thumbs-up"></i>Won: </td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-thumbs-down"></i>Lost: </td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-shield"></i>Win Rate: </td>
                        <td>100%</td>
                    </tr>
                </table>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="spacer50"></div>

        <div id="teamPlayers" class="well">
            <h2 class="notopmargin">Team Players</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Name</th><th>Position</th><th><abbr title="Kills / Deaths / Assissts Ratio" class="initialism">K / D / A</abbr></th></tr>
                @foreach ($team->getPlayers() as $player)
                <tr>
                    <td><strong><a href="{{ URL::route('player-profile',$player->playerID) }}">{{$player->nick }}</a></strong>
                        <br/>{{ $player->name, " ", $player->last_name }}
                    </td>
                    <td>{{$player->position}}</td>
                    <td>6.4 / 1.8 / 9.2</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="spacer50"></div>

        <div id="teamHistory" class="well">
            <h2 class="notopmargin">Latest Matches</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Opponent</th><th>Tournament</th><th>Result</th><th></th></tr>
                <tr>
                    <td><a href="#">Empire</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-danger">Lost</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Alliance</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-success">Won</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Empire</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-danger">Lost</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Alliance</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-success">Won</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Empire</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-danger">Lost</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Alliance</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-success">Won</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Empire</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-danger">Lost</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                <tr>
                    <td><a href="#">Alliance</a></td>
                    <td>Joindota Open League IV</td>
                    <td class="text-success">Won</td>
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
            </table>
        </div>

    </div>
</div>

<!--invite players modal -->
@if ($player->teamID == $team->teamID)
    <div class="modal fade" id="invite-players" tabindex="-1" role="dialog" aria-labelledby="invite-players">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Invite players to {{$team->name}} team</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="player">Search for a player by nickname</label>
                        <input type="text" class="form-control" id="player" name="player" placeholder="Enter Nickname" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Invite</button>
                </div>
            </div>
        </div>
    </div>
@endif

@stop