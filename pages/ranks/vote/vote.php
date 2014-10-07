<!-- Main hero unit for a primary marketing message or call to action -->
    <?php
    if($player->get_current_rank() == 'mod' OR $player->get_current_rank() == 'admin' OR $player->get_current_rank() == 'owner'){
    echo'
        <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <b>Info</b> Your votes are removed form the list because you are an member of the ETG staff.
        </div>
        ';
    }
    ?>
     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#FFAA00">[</font><font color="#AA0000"><?php echo $config->get_voter_limits()['NAME_1'];?></font><font color="#FFAA00">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_voter_limits()['NAME_1'];?>:</h4>
         <?php
          $names=$server->get_playersbyrank('voter',1);
          if($names){
          foreach($names as $k)
          {
           echo '<img src="';
           echo get_face($k['name']);
           echo '"title="';
           echo $k['name'];
           echo '" style="margin:2px;"></img>';
          }
          }
         ?>
      </div>
    </div>


      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
            <div class="thumbnail">
          <h2>Description:</h2>
          <p> You can vote once a day.</p>
          <p> You get 100$ per vote and if you are one of the top 3 players with the most votes in the previous month, you will be able to get the voter-rank next month.</p>
          <p>To get a list of links to the server lists wher you can vote klick press the button below.</p>
          <button class="btn btn-primary" type="button" href="#vote_modal" role="button" data-toggle="modal">Vote Links&raquo;</button>
        </div>
		</div>
       <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can create Web Auction Signs.</li>
          <li>Can link warps to buttons/pressure plates.</li>
          <li>Can see how many money a other player has.</li>
          <li>Can see the money ranking.</li>
          <li>Can use the <b>cave view</b> from <a href="http://www.minecraftforum.net/topic/482147-151-mar21-reis-minimap-v33-04/">Rei's Minimap.</a></li>
          <li>Can use the <b>entity radar</b> from <a href="http://www.minecraftforum.net/topic/482147-151-mar21-reis-minimap-v33-04/">Rei's Minimap.</a></li>
          <li>Can create <a href="#marker_modal" role="button" data-toggle="modal">marker signs</a>.</li>
          <li>Can teleport to other player.</li>
          <li>Can teleport other player to him.</li>
          <li>Can set 40 Warp's.</li>
          <li>Can build on the special <a href="http://minecraft.gamepedia.com/Amplified">Amplified Terrain</a> map.</li>
          </ul>
         </div>
       </div>
        <div class="span4">
         <div class="thumbnail">
          <h2>Commands:</h2>
          <ul>
          <li>All Builder commands</li>
          <li><b>/money <name> </b>to see the balance from another player.</li>
          <li><b>/money top</b> to see the 5 richest players.</li>
          <li><b>/link</b> to link warps to buttons.</li>
          <li><b>/to <name></b> to tp to an other player.</li>
          <li><b>/from <name></b> to tp an other player to you.</li>
          <li><b>/dynmap show</b> and <b>/dynmap hide</b> to control the visibility on the <a href="http://map.etg-clan.at">live map</a>.</li>
          </ul>
        </div>
       </div>
      </div>
<hr>
<div class="row">
    <div class="span6">
        <div class="thumbnail">
          <h2>Top 10 Voters last month:</h2>
            <table width="100%">
                <tbody>
                    <?php
                        $votes_lm = $server->get_votes_lm(10);
                        if($votes_lm){
                        $i = 1;
                        foreach($votes_lm as $k){
                             echo '<td align="center" valign="top">';
                             echo '<img src="'. get_face($k['username']) .'"title="'. $k['username'] .'"></img>&nbsp';
                             echo '</td><td width ="80%" align="center">';
                             if($i<4){
                                echo '<div class="progress progress-success progress-striped">';
                             } else {
                                echo '<div class="progress progress-info progress-striped">';    
                             }
                             echo '<div class="bar" style="width:'. calculate_proz($k['votes'], $votes_lm[0]['votes']) .'%">'.$k['votes'].' Votes</div>';
                             echo '</div>';            
                             echo '</td>';
                             echo '</tr>'; 
                        $i++;     
                        }
                        }
                   ?>
            </tbody>
        </table>
      </div>
    </div>    
    <div class="span6">
        <div class="thumbnail">
          <h2>Top 10 Voters this month:</h2>
            <table width="100%">
                <tbody>
                    <?php
                        $votes_tm = $server->get_votes_tm(10);
                        if($votes_tm){
                        $i = 1;
                        foreach($votes_tm as $k){
                             echo '<td align="center" valign="top">';
                             echo '<img src="';
                             $votes_lm = $server->get_votes_lm_player($k['username']);
                             if($k['votes'] == $votes_lm){ echo "./images/arrow_stady.png";}
                             elseif ($k['votes'] < $votes_lm){ echo "./images/arrow_down.png";}
                             else echo "./images/arrow_up.png";
                             echo '"width="30" height="30""></img>&nbsp';
                             echo '</td><td align="center" valign="top">';
                             echo '<img src="'. get_face($k['username']) .'"title="'. $k['username'] .'"></img>&nbsp';
                             echo '</td><td width ="80%" align="center">';
                             if($i<4){
                                echo '<div class="progress progress-success progress-striped">';
                             } else {
                                echo '<div class="progress progress-info progress-striped">';    
                             }
                             echo '<div class="bar" style="width:'. calculate_proz($k['votes'], $votes_tm[0]['votes']) .'%">'.$k['votes'].' Votes</div>';
                             echo '</div>';            
                             echo '</td>';
                             echo '</tr>';
                             $i++;  
                        }
                        }
                   ?>
            </tbody>
        </table>
      </div>
    </div>
</div>   
<hr>
<!-- Modal -->
<div id="marker_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Info</h3>
  </div>
  <div class="modal-body">
    <h3>How to set dynmap markers:</h3>
    <p>You can create markers using specially labelled signs. To use these, the first line of the sign <b>MUST be [dynmap]</b>.<br>
       After that, any non-blank line will be included in the label of the marker, except for line formatted as <b>icon:icon-id</b> (which allows the marker to be set to
       use a specific icon - if not specified, the icon sign is used). <br>
       If the marker is successfully created, the sign's text will erase the [dynmap] and icon: lines. If the sign is later deleted, the corresponding map marker is deleted.</p>
       <h3>Avivable Icons:</h3>
       <img src="https://a248.e.akamai.net/camo.github.com/9dd331c833aa00d40f086067179f4fa0e0d512bf/687474703a2f2f6d696b657072696d6d2e636f6d2f696d616765732f6d61726b657269636f6e732d3033322e706e67"></img>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<!-- Modal -->
<div id="vote_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Info</h3>
  </div>
  <div class="modal-body">
    <h3>How to vote for our Server:</h3>
    <p>You can vote once a day on the following server lists. For each vote you get 50$ and if you have the most votes after one month you get the Vote King rank.</p>
       <h3>Server Lists:</h3>
       <ul>
	   <li><a href="http://minecraft-mp.com/server-s516">www.minecraft-mp.com</a></li>
           <li><a href="http://theminecraftserverlist.com/server/mc.etg-clan.at">www.theminecraftserverlist.com</a></li>
           <li><a href="http://www.minecraft-serverlist.net/server/504">www.minecraft-serverlist.net</a></li>
           <li><a href="http://minecraftservers.org/server/144508">www.minecraftservers.org</a></li>
           <li><a href="http://minecraft-server-list.com/server/45509/">www.minecraft-server-list.com</a></li>
           <li><a href="https://minestatus.net/29670-etg-free-build-and-survival-24-7">www.minestatus.net</a></li>
           <li><a href="http://minecraft.serverlister.com/servers/f8e35bf0b36c43eb921bd3cf4294c1bb/etg-free-build-and-survival-24-7">www.serverlister.com</a></li>
           <li><a href="http://www.minecraft-index.com/848-etg-free-build-and-survival-24-7">www.minecraft-index.com</a></li>
           <li><a href="http://minecraft-server.eu/index.php?go=server&id=78519">www.minecraft-server.eu</a></li>
           <li><a href="http://www.planetminecraft.com/server/etg-free-build-and-survival-247/">www.planetminecraft.com</a></li>
       </ul>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
                