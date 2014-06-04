@extends("template/main")

@section("page_title")
Invites
@stop

@section("container")
<?php 
$i=1; 
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">You have been invited!</h3>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Team</th>
                            <th>Accept</th>
                            <th>Decline</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invites as $invite)
                        <?php $invite->getData(); ?>
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $invite->inviterPlayer->nick }} is inviting you to join his </td>
                            <td>{{ "[",$invite->invitedTeam->tag, "] ",  $invite->invitedTeam->name }} team</td>
                            <td><a href="{{ URL::route('answerInvitePlayer', array($invite->locID, "accept"))}}">Accept</a></td>
                            <td><a href="{{ URL::route('answerInvitePlayer', array($invite->locID, "decline"))}}">Decline</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 

            </div>
        </div>
    </div>
</div>
@stop

