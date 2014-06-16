<?php

 //   var_dump($matches[0]->guestTeam->tag);
     
?>
 
<div id='big'>
    <div class='demo'></div>
</div>
<div class="clearfix"></div>

<div>
    <?php
    $str = "";
    foreach($matches as $match){
        if($match->host != null && $match->guest != null){
            $str .= '["['.$match->hostTeam->tag.'] '.$match->hostTeam->name.'",'  ;
            $str .= '"['.$match->guestTeam->tag.'] '.$match->guestTeam->name.'"],'  ; 
        }
  
    }
    echo rtrim($str,",");
    
    ?>
</div>

<script>

var bracketsData = {
  "teams": [              // Matchups
      {{$str}}
    ],
  "results": [            // List of brackets (single elimination, so only one bracket)
    [                     // List of rounds in bracket
      [                   // First round in this bracket
        [1, 2],           // Team 1 vs Team 2
        [3, 4],            // Team 3 vs Team 4
        [1, 2],
        [1, 2],
      ],
                         // Second (final) round in single elimination bracket
                   // Match for first place
                   // Match for 3rd place
      
    ]
  ]
}

</script>
   