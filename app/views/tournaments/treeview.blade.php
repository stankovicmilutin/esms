<?php

    foreach ($matches as $match) {
        $matchArray[$match->matchID] = $match;
    }
    genTree($final, $matchArray);

    function genTree($finalMatch, $matchArray) {
        $match = $matchArray[$finalMatch];
        printMatch($match);
        if ($match->child_match_a != NULL && $match->child_match_b != NULL) {
            genTree($match->child_match_a, $matchArray);
            genTree($match->child_match_b, $matchArray);
        }
    }

    function printMatch($match) {
        echo '<div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">'. $match->tournament_phase .'</h3>
                </div>
                <div class="panel-body">';
        
               if($match->hostTeam != null)
                   echo $match->hostTeam->name,"</br>";
               if($match->guestTeam != null)
                   echo $match->guestTeam->name;
               
        echo  '</div>
              </div>';
    }
    ?>
