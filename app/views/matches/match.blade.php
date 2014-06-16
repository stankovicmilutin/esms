@extends("template/main")

@section("page_title")
Matches
@stop

@section("container")
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div class="col-md-5">
                        @if ($match->hostTeam)
                        <div class="alert alert-info"><h2 class="text-center"><a href="{{URL::Route('team', $match->hostTeam->teamID)}}}">{{$match->hostTeam->name}}</a></h2></div>
                        @else
                        <div class="alert alert-info"><h2 class="text-center"><a href="#">TBA</a></h2></div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <h2 class="text-center">vs.</h2>
                    </div>
                    <div class="col-md-5">
                        @if ($match->guestTeam)
                        <div class="alert alert-info"><h2 class="text-center"><a href="{{URL::Route('team', $match->guestTeam->teamID)}}}">{{$match->guestTeam->name}}</a></h2></div>
                        @else
                        <div class="alert alert-info"><h2 class="text-center"><a href="#">TBA</a></h2></div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="alert alert-warning text-center">
                    @if ($match->winnerID && ($match->winnerID == $match->hostTeam->teamID))
                    <h3>{{$match->hostTeam->name}} won!</h3>
                    @elseif ($match->winnerID && ($match->winnerID == $match->guestTeam->teamID))
                    <h3>{{$match->guestTeam->name}} won!</h3>
                    @endif
                    {{ date("d. M Y @ G:i", strtotime($match->time))}}
                </div>

                @if ($match->hostTeam && count($scores)>0)
                <div class="well">
                <h4 class="notopmargin">{{$match->hostTeam->name}}</h4>
                    <table class="table table-hover esmsTable">
                        <tr>
                            <th>Player</th>
                            <th>Hero/Champion</th>
                            <th>CS</th>
                            <th>Kills</th>
                            <th>Deaths</th>
                            <th>Assists</th>
                        </tr>
                        @foreach ($scores as $score)
                        <?php if ($score->player->teamID != $match->hostTeam->teamID) 
                        continue
                        ?>
                        <tr>
                            <td><a href="{{URL::Route('player-profile', $score->player->playerID)}}" target="_blank">{{$score->player->nick}}</a></td>
                            <td>{{$score->entity}}</td>
                            <td>{{$score->cs}}</td>
                            <td>{{$score->k}}</td>
                            <td>{{$score->d}}</td>
                            <td>{{$score->a}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @elseif ($match->hostTeam)
                <div class="well">
                <h4 class="notopmargin">{{$match->hostTeam->name}}</h4>
                    <table class="table table-hover esmsTable">
                        <tr>
                            <th>Player</th>
                            <th>Hero/Champion</th>
                            <th>CS</th>
                            <th>Kills</th>
                            <th>Deaths</th>
                            <th>Assists</th>
                        </tr>
                        @foreach ($match->playersHost as $player)
                        <tr>
                            <td><a href="{{URL::Route('player-profile', $player->playerID)}}" target="_blank">{{$player->nick}}</a></td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

                @if ($match->guestTeam && count($scores)>0)
                <div class="well">
                <h4 class="notopmargin">{{$match->guestTeam->name}} Player Scores</h4>
                    <table class="table table-hover esmsTable">
                        <tr>
                            <th>Player</th>
                            <th>Hero/Champion</th>
                            <th>CS</th>
                            <th>Kills</th>
                            <th>Deaths</th>
                            <th>Assists</th>
                        </tr>
                        @foreach ($scores as $score)
                        <?php if ($score->player->teamID != $match->guestTeam->teamID) 
                        continue
                        ?>
                        <tr>
                            <td><a href="{{URL::Route('player-profile', $score->player->playerID)}}">{{$score->player->nick}}</a></td>
                            <td>{{$score->entity}}</td>
                            <td>{{$score->cs}}</td>
                            <td>{{$score->k}}</td>
                            <td>{{$score->d}}</td>
                            <td>{{$score->a}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @elseif ($match->guestTeam)
                <div class="well">
                <h4 class="notopmargin">{{$match->guestTeam->name}} Player Scores</h4>
                    <table class="table table-hover esmsTable">
                        <tr>
                            <th>Player</th>
                            <th>Hero/Champion</th>
                            <th>CS</th>
                            <th>Kills</th>
                            <th>Deaths</th>
                            <th>Assists</th>
                        </tr>
                        @foreach ($match->playersGuest as $player)
                        <tr>
                            <td><a href="{{URL::Route('player-profile', $player->playerID)}}">{{$player->nick}}</a></td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
@stop