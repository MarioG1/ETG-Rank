<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#000000">[</font><font color="#AA0000"><?php echo $config->get_warrior_limits()['NAME_2'];?></font><font color="#000000">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_warrior_limits()['NAME_2'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('warrior',2);
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
           To achieve this rank you have to be very fearsome.<br>
           You have to kill more than 100 People, 10 unique kills this means that you have to kill at least 10 different people and you have to have a KD (Kill-Death proportion) of 4 or higher. That means that (kill-count)/(death-count) >= 4.
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can set 40 Warp's.</li>
          <li>Can use the <b>entity radar</b> from <a href="http://www.minecraftforum.net/topic/482147-151-mar21-reis-minimap-v33-04/">Rei's Minimap.</a></li>
          <li>Can build on the special <a href="http://minecraft.gamepedia.com/Amplified">Amplified Terrain</a> map.</li>
          </ul>
       </div>
	   </div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Commands:</h2>
          <ul>
          <li>All Builder commands</li>
          <li><b>/dynmap show</b> and <b>/dynmap hide</b> to control the visibility on the <a href="http://map.etg-clan.at">live map</a>.</li>
          </ul>
        </div>
		</div>
      </div>

      <hr>