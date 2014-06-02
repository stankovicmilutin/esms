@extends("template/main")

@section("container")
        <div class="row">
            <div class="col-md-12">
                <div id="teamInfo" class="well">
                    <div class="col-md-2">
                        <img src="img/navi.jpg" alt="Team Logo" class="img-rounded">
                    </div>
                    <div class="col-md-10">
                        <h2>Player Name</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                        <button type="button" class="btn btn-success">Edit Profile</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="spacer50"></div>
                    <div class="col-md-6">
                        <table class="table">
                            <tr><th></th><th></th></tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-flag"></i>Country: </td>
                                <td>Ukraine</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-child"></i>Full Name: </td>
                                <td>Danil Ishutin</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-trophy"></i>Team: </td>
                                <td><a href="#">Na'Vi</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <tr><th></th><th></th></tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-thumbs-up"></i>Average Kills: </td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-thumbs-down"></i>Average Deaths: </td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td class="text-info"><i class="fa fa-shield"></i>Average Assissts: </td>
                                <td>100</td>
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
@stop

