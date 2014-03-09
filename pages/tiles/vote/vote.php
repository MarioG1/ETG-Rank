<h2>Vote King</h2>
<h5>Top 3 voters last month:</h5>
<table width="100%">
    <tbody>
        <?php
        $votes = $server->get_votes_lm(3);
        if($votes){
        foreach($votes as $k){
            echo '<td align="center" valign="top">';
            echo '<img src="'. get_face($k['username']) .'"title="'. $k['username'] .'"></img>&nbsp';
            echo '</td><td width ="80%" align="center">';
            echo '<div class="progress progress-striped">';
            echo '<div class="bar" style="width:'. calculate_proz($k['votes'], $votes[0]['votes']) .'%">'.$k['votes'].' Votes</div>';
            echo '</div>';            
            echo '</td>';
            echo '</tr>';  
        }
        }
            ?>
    </tbody>
</table>
<h5>Vote ratio:</h5>
<div class="progress progress-striped">
    <?php
        if(calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes']) < 0){
         echo '<div class="bar bar-empty" style="width: '. (50-(-1*calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes']))/2) .'%; display: block; float: left; color: black;">'. calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes']) .'%</div>';
         echo '<div class="bar bar-danger" style="width: '. (-1*calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes'])/2) .'%; display: block; float: left;"></div>';           
        } else{
         echo '<div class="bar bar-empty" style="width: '. (50-(calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes'])/2)) .'%; display: block; float: right;"></div>'; 
         echo '<div class="bar bar-success" style="width: '. (calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes'])/2) .'%; display: block; float: right; color: black;">+'. calculate_vote_ratio($player->get_votes_tm()['votes'], $player->get_votes_lm()['votes']) .'%</div>';    
        }
    ?>
</div>
<p>If you want to support our server without paying money, you can vote on different minecraft server lists.</p>
<p><form method="POST"><?php draw_button($player,'voter',1)?>&nbsp;<a class="btn" href="?page=voter">View details&raquo;</a></from></p>
