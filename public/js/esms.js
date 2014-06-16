$(document).ready(function() {
    $(".removePlayerButton").click(function() {
        var id = $(this).attr("data-plid");
        $("#playerForRemove").val(id);
    });

    var playerSearch = $("#playerSearchInvite");
    var teamID = playerSearch.attr("data-teamid");
    var inviterID = playerSearch.attr("data-playerid");
    var playerSearchUrl = playerSearch.attr("data-action");
    var playerInviteUrl = playerSearch.attr("data-action-invite");

    playerSearch.keydown(function() {
        var playerName = playerSearch.val();
        if (playerName.length < 3)
            return;

        $.ajax({
            type: "POST",
            url: playerSearchUrl,
            data: {name: playerName, teamid: teamID}
        })
                .done(function(data) {
                    data = JSON.parse(data);
                    //console.log(data[0]['username']);
                    if (data.length < 1) {
                        $("#playerSearchResults").html('<li class="list-group-item">No results.</li>');
                    } else {
                        $("#playerSearchResults").html('');

                        for (var i = 0; i < data.length; i++) {
                            $("#playerSearchResults").append('<li class="list-group-item playerNameResult">' + data[i]['username'] + ' - <a href="#" data-playerid="' + data[i]['id'] + '">Invite</a></li>');
                        }

                        $(".playerNameResult a").click(invitePlayer);
                    }
                    //console.log( data );
                });
    });

    function invitePlayer() {

        var playerId = $(this).attr("data-playerid");

        //console.log(this.attr())
        $.ajax({
            type: "POST",
            url: playerInviteUrl,
            data: {playerid: playerId, teamid: teamID, inviterid: inviterID}
        })
                .done(function(data) {
                    playerSearch.val("");
                    $("#playerSearchResults").html("");

                    if (data == 1) {
                        $("#invite-players .modal-body").prepend('<div class="alert alert-dismissable alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">×</button>' +
                                'Player is invited to join your team.' +
                                '</div>');
                    } else {
                        $("#invite-players .modal-body").prepend('<div class="alert alert-dismissable alert-error">' +
                                '<button type="button" class="close" data-dismiss="alert">×</button>' +
                                'Internal error, sorry for the inconvinience.' +
                                '</div>');
                    }
                });

    }



    /* TREEVIEW BRACKETS */
    $(function() {
        $('div#big .demo').bracket({
            init: bracketsData,
            skipConsolationRound: true,
        })
    })

});