@extends("template/main")

@section("page_title")
    {{$user->username}}
@stop


@section("container")
        <div class="row">
            <div class="col-md-12">
                <div id="teamInfo" class="well">
                    <div class="col-md-2">
                        @if ($player->avatar)
                            <img src="{{ $player->avatar }}" alt="{{ $player->name }}" class="img-rounded">
                        @else
                            <img src="{{ asset('img/anon.jpg') }}" alt="No photo yet!" class="img-rounded">
                        @endif
                        
                    </div>
                    <div class="col-md-10">
                        <h2>{{$user->username}}</h2>
                        <p>{{$player->bio}}</p>
                    </div>
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
                                <td><a href="#"></a></td>
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

