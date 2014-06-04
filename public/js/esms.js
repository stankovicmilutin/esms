$(document).ready(function(){
        $(".removePlayerButton").click(function(){
        	var id = $(this).attr("data-plid");
        	$("#playerForRemove").val(id);
        });

        var playerSearch = $("#playerSearchInvite");
        var teamID = playerSearch.attr("data-teamid");
        var playerSearchUrl = playerSearch.attr("data-action");

        playerSearch.keydown(function() {
        	var playerName = playerSearch.val();
        	if (playerName.length < 3)
        		return;

			$.ajax({
				type: "POST",
				url: playerSearchUrl,
				data: { name: playerName, teamid: teamID }
				})
				.done( function( data ) {
					data = JSON.parse(data);
					//console.log(data[0]['username']);
					if (data.length < 1) {
						$("#playerSearchResults").html('<li class="list-group-item">No results.</li>');
					} else {
						$("#playerSearchResults").html('');

						for (var i = 0; i < data.length; i++) {
						    $("#playerSearchResults").append('<li class="list-group-item playerNameResult"><a href="#" data-userid="'+data[i]['id']+'">'+data[i]['username']+'</a></li>');
						}

						$(".playerNameResult a").click(function() {invitePlayer();});
					}
					//console.log( data );
				});
        });

        function invitePlayer() {
        	alert("ll");
        }
});