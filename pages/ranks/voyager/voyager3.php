<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#555555">[</font><font color="#AA00AA"><?php echo $config->get_voyager_limits()['NAME_3'];?></font><font color="#555555">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_voyager_limits()['NAME_3'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('voyager',3);
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
           Be on the run!<br> To get the <?php echo $config->get_voyager_limits()['NAME_3'];?> Rank you have to go very far. <br>
           After <?php echo number_format($config->get_voyager_limits()['TOTAL_3'], 2, ',', '.'); ?>m Traveled and (walked, swum, piggybacked, mine card) and <?php echo number_format($config->get_voyager_limits()['WALKED_3'], 2, ',', '.'); ?>m walked you've got the possibility to Choosee this rank!
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can set 50 Warp's.</li>
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
          <li><b>/to <name></b> to tp to an other player.</li>
          <li><b>/from <name></b> to tp an other player to you.</li>
          <li><b>/dynmap show</b> and <b>/dynmap hide</b> to control the visibility on the <a href="http://map.etg-clan.at">live map</a>.</li>
          </ul>
        </div>
		</div>
      </div>

      <hr>

      <hr>