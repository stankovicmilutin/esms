@extends("template/main")

@section("container")
        <div class="row">
            <div class="col-md-12">
                <div id="teamInfo" class="well">
                    <div class="col-md-2">
                        <img src="img/navi.jpg" alt="Team Logo" class="img-rounded">
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
                                <td>{{$player->name}} {{$player->lastname}}</td>
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
                                <td>{{$player->kills}}</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-twitter"></i>Twitter: </td>
                                <td>{{$player->deaths}}</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-steam"></i>Steam: </td>
                                <td>{{$player->assists}}</td>
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

