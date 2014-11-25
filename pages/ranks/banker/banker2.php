<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#00AAAA">[</font><font color="#55FFFF"><?php echo $config->get_banker_limits()['NAME_2'];?></font><font color="#00AAAA">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_banker_limits()['NAME_2'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('banker',2);
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
          <p>
          You are rich and want that other people can see that you've got a lot of money? Then you need to have more than <?php echo number_format($config->get_banker_limits()['MONEY_2'], 2, ',', '.'); ?>$ in your Economy-Account to get this rank. To see your current money balance In-Game use the /money command. 
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can set 40 Warp's.</li>
          <li>Can create Web Auction Signs.</li>
          <li>Can see how many money a other player has.</li>
          <li>Can see the money ranking.</li>
          <li>Can teleport to other player.</li>
          <li>Can teleport other player to him.</li>
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
          <li><b>/to <name></b> to tp to an other player.</li>
          <li><b>/from <name></b> to tp an other player to you</li>
          <li><b>/dynmap show</b> and <b>/dynmap hide</b> to control the visibility on the <a href="http://map.etg-clan.at">live map</a>.</li>
          </ul>
        </div>
		</div>
      </div>

      <hr>