@extends("admin/main")

@section("page_title")
Edit Match
@stop

@section("content")
    <div class="row">
        <div class="col-md-5 well text-center">
            @if ($match->hostTeam)
            <a href="{{URL::Route('team', $match->hostTeam->teamID)}}">{{ $match->hostTeam->name }}</a>
            @else 
            TBA
            @endif
        </div>
        <div class="col-md-2 text-center" style="padding: 19px;">vs</div>
        <div class="col-md-5 well text-center">
            @if ($match->guestTeam)
            <a href="{{URL::Route('team', $match->guestTeam->teamID)}}">{{ $match->guestTeam->name }}</a>
            @else 
            TBA
            @endif
        </div>
    </div>

    <div class="row well">
        <form action=" {{URL::Route('adminSaveMatchInfo', $match->matchID) }} " method="post">
            <div class="form-group">
                <label for="winner">Match Winner:</label>
            @if ($match->hostTeam && $match->guestTeam)
                <select name="winner" id="winner" class="form-control" >
                    <option value="-1">No winner yet</option>
                    <option value="{{$match->hostTeam->teamID}}" @if ($match->winnerID == $match->hostTeam->teamID) selected @endif>{{$match->hostTeam->name}}</option>
                    <option value="{{$match->guestTeam->teamID}}" @if ($match->winnerID == $match->guestTeam->teamID) selected @endif>{{$match->guestTeam->name}}</option>
                </select>
            @else
                <p>This is a match in a knockout tournament and you must first enter the results of matches in previous phases.</p>
            @endif
            </div>
            <div class="form-group">
                <label for="datetime">Match Date and Time</label>
                <input class="form-control" type="text" class="form-control" id="datetime" name="datetime"  placeholder="In 28-12-2014 HH:MM format" value="{{$match->time}}">
                 @if($errors->has('datetime'))
                    <label class="text-danger" for="inputError">
                        {{ $errors->first('datetime') }}
                    </label>
                @endif 
            </div>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
    @if ($match->hostTeam && $match->guestTeam)
    <form action=" {{URL::Route('adminSavePlayerStats', array($match->matchID, $match->tournamentID)) }} " method="post">
    <div class="row well">
    <h4 class="notopmargin">{{$match->hostTeam->name}} Player Scores</h4>
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
            <td><input type="text" name="stats[{{$player->playerID}}][hero]" class="form-control"  {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->entity).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][cs]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->cs).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][kills]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->k).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][deaths]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->d).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][asssts]"class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->a).'"' : '' }}></td>
        </tr>
        @endforeach
    </table>
    <div class="spacer30"></div>
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
            <td><a href="{{URL::Route('player-profile', $player->playerID)}}" target="_blank">{{$player->nick}}</a></td>
            <td><input type="text" name="stats[{{$player->playerID}}][hero]" class="form-control"  {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->entity).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][cs]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->cs).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][kills]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->k).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][deaths]" class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->d).'"' : '' }}></td>
            <td><input type="text" name="stats[{{$player->playerID}}][asssts]"class="form-control" {{ (isset($player->scores[0])) ? ' value="'.e($player->scores[0]->a).'"' : '' }}></td>
        </tr>
        @endforeach
    </table>

    <input type="submit" class="btn btn-primary" value="Save Player Scores">
    </div>
    </form>
    @endif
@stop