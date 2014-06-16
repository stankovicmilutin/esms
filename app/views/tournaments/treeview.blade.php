<?php

    foreach ($matches as $match) {
        $matchArray[$match->matchID] = $match;
    }
    /*genTree($final, $matchArray);*/
    $currentMatch = $matchArray[$final];

    $red = new SplQueue();
    $c = 1;
    echo '<table class="bracketsTable"><tr>';
    while ($currentMatch) {
      if ($c == 1 || $c == 2 || $c == 4 || $c == 8 || $c == 17 || $c == 33)
      echo '<td style="padding-right:30px">';
      printMatch($currentMatch);
      
      if ($c == 1 || $c == 3 || $c == 7 || $c == 15 || $c == 31 || $c == 63)
      echo '</td>';
      $c++;

      $red->enqueue($currentMatch->child_match_a);
      $red->enqueue($currentMatch->child_match_b);
      
      $i = $red->dequeue();
      if ($i)
        $currentMatch = $matchArray[$i];
      else
        $currentMatch = NULL;
    }
    echo '</table></tr>';
    /*function genTree($finalMatch, $matchArray) {
        $match = $matchArray[$finalMatch];
        printMatch($match);
        if ($match->child_match_a != NULL && $match->child_match_b != NULL) {
            genTree($match->child_match_a, $matchArray);
            genTree($match->child_match_b, $matchArray);
        }
    }*/

    function printMatch($match) {
        echo '<div>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">'. $match->tournament_phase .'</h3>
                    </div>
                    <div class="panel-body">';
        
                if($match->hostTeam != null)
                    echo $match->hostTeam->name;
                else
                  echo 'TBA';
                echo "<hr>";
                if($match->guestTeam != null)
                    echo $match->guestTeam->name;
                else
                  echo 'TBA';
        echo  '     </div>
                </div>
              </div>';
    }
    ?>
