@extends("template/main")

@section("page_title")
{{$player->nick}}
@stop

@section("container")
<div class="row">
    <div class="col-md-12">
        <div id="teamInfo" class="well">
            <div class="col-md-2">
                @if ($player->avatar)
                <img src="{{ asset('uploads') . '/' . $player->avatar }}" alt="{{ $player->name }}" class="img-rounded" width="140">
                @else
                <img src="{{ asset('img/anon.jpg') }}" alt="No photo yet!" class="img-rounded" height="140">
                @endif
            </div>
            <div class="col-md-8">
                <h2>{{$player->nick}}</h2>
                <p>{{$player->bio}}</p>
            </div>
            @if(Auth::check() && Auth::user()->player->playerID == $player->playerID)
            <div class="col-md-2">
                <ul class="nav nav-pills">
                    <div class="btn-group">
                        <a href="{{ URL::route("editPlayerProfile",$player->playerID)}}"><button type="button" class="btn btn-primary">Edit profile</button></a>
                    </div>              
                </ul>
            </div>
            @endif
            <div class="clearfix"></div>
            <div class="spacer50"></div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-flag"></i>Country: </td>
                        <td>{{$player->country}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-child"></i>Full Name: </td>
                        <td>{{$player->name}} {{$player->last_name}}</td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-trophy"></i>Team: </td>
                        @if ($team)
                        <td><a href="{{URL::route('team', $team->teamID)}}">{{$team->name}}</a></td>
                        @else
                        <td>(No team yet)</td>
                        @endif
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th></th><th></th></tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-facebook"></i>Facebook: </td>
                        <td><a href="{{$player->facebook}}">{{$player->facebook}}</a></td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-twitter"></i>Twitter: </td>
                        <td><a href="{{$player->twitter}}">{{$player->twitter}}</a></td>
                    </tr>
                    <tr>
                        <td class="text-info"><i class="fa fa-steam"></i>Webiste: </td>
                        <td><a href="{{$player->website}}">{{$player->website}}</a></td>
                    </tr>
                </table>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="spacer50"></div>

        <div class="spacer50"></div>

        <div id="teamHistory" class="well">
            <h2 class="notopmargin">Latest Matches</h2>
            <div class="spacer30"></div>

                    <!--<table class="table table-hover esmsTable">
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
                </div>-->

        </div>
    </div>
    @stop

