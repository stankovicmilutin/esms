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
                @if (Auth::check() && $player->teamID == $team->teamID)
                <ul class="nav nav-pills">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Team Options</button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @if ($captain)
                            <li><a href="{{ URL::route('editTeamView', $team->teamID) }}">Edit team</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#invite-players">Invite players</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#change-captain">Change captain</a></li>
                            @endif
                            @if (!$captain)
                            <li><a href="#" data-toggle="modal" data-target="#leave-team">Leave team</a></li>
                            @endif
                            @if ($captain)
                            <li class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#disband-team">Disband team</a></li>
                            @endif
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
                        <td><a href="{{$team->website}}">{{$team->website}}</a></td>
                    </tr>

                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-thumbs-up"></i>Won: </td>
                        <td>{{$team->wins}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-thumbs-down"></i>Lost: </td>
                        <td>{{$team->lost}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-shield"></i>Win Rate: </td>
                        <td>{{$wr}}%</td>
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
                <tr><th>Name</th><th>Position</th><th>Country</th></tr>
                @foreach ($team->getPlayers() as $player)
                <tr>
                    <td><strong><a href="{{ URL::route('player-profile',$player->playerID) }}">{{$player->nick }}</a></strong>
                        <br/>{{ $player->name, " ", $player->last_name }}
                    </td>
                    <td>{{$player->position}}</td>
                    <td>{{$player->country}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="spacer50"></div>

        <div id="teamHistory" class="well">
            <h2 class="notopmargin">Latest Matches</h2>
            <div class="spacer30"></div>
            <table class="table table-hover esmsTable">
                <tr><th>Host</th><th>Guest</th><th>Tournament</th><th>Result</th><th></th></tr>
                @foreach($matches as $match)
                <tr>
                    <td><a href="{{URL::route('team',$match->hostTeam->teamID)}}">{{"[",$match->hostTeam->tag,"]",$match->hostTeam->name}}</a></td>
                    <td><a href="{{URL::route('team',$match->guestTeam->teamID)}}">{{"[",$match->guestTeam->tag,"]",$match->guestTeam->name}}</a></td>
                    <td><a href="{{URL::route('tournament',$match->tournament->tournamentID)}}">{{$match->tournament->name }}</a></td>
                    @if($match->winnerID == $team->teamID)
                    <td class="text-success">Won</td>
                    @else
                    <td class="text-danger">Lost</td>
                    @endif
                    <td><a href="#"><button type="button" class="btn btn-info">View Details</button></a></td>
                </tr>
                @endforeach
                
            </table>
        </div>

    </div>
</div>

@if ($player->teamID == $team->teamID)

    <!--leave team modal -->
    <div class="modal fade" id="leave-team" tabindex="-1" role="dialog" aria-labelledby="leave-team">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Leave {{$team->name}}</h4>
                </div>
                <div class="modal-body">
                    Warning! This action can not be undone. Are you sure that you want to leave this team?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="{{URL::route('leaveTeamData')}}"><button type="button" class="btn btn-primary">Leave</button></a>
                </div>
            </div>
        </div>
    </div>

    @if ($captain)
    <!--disband team modal -->
    <div class="modal fade" id="disband-team" tabindex="-1" role="dialog" aria-labelledby="disband-team">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Disband {{$team->name}}</h4>
                </div>
                <div class="modal-body">
                    Warning! This action can not be undone. Disbanding will remove all players from this team, including you!
                </div>
                <div class="modal-footer">
                <form method="post" action="{{URL::route('disbandTeamData', $team->teamID)}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Disband</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!--invite players modal -->
    <div class="modal fade" id="invite-players" tabindex="-1" role="dialog" aria-labelledby="invite-players">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Invite players to {{$team->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="player">Search for a player by nickname</label>
                        <input type="text" class="form-control" id="playerSearchInvite" name="player" placeholder="Enter Nickname" 
                        data-action="{{URL::route('playersLiveSearch')}}" data-action-invite="{{URL::route('playersLiveInvite')}}"  data-teamid="{{$team->teamID}}" data-playerid="{{$player->playerID}}">
                            <ul id="playerSearchResults" class="list-group">
                              <!--<li class="list-group-item">Cras justo odio</li>-->
                            </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--change captain modal -->
    <div class="modal fade" id="change-captain" tabindex="-1" role="dialog" aria-labelledby="change-captain">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Change captain of {{$team->name}}</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover esmsTable">
                        <tr><th>Name</th><th></th></tr>
                        @foreach ($team->getPlayers() as $player)
                        <tr>
                            <td><a href="{{ URL::route('player-profile',$player->playerID) }}">{{$player->nick }}</td>
                            @if ($player->playerID == $team->captain)
                            <td>(Captain)</td>
                            @else
                            <td><a href="{{ URL::route('changeCaptainData', array('id' => $player->playerID, 'teamid' => $team->teamID) ) }}">Promote to Captain</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    <p>Warning! By promoting another player to captain, you will lose your captain status. Only one player can be a captain of a team.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif


@stop