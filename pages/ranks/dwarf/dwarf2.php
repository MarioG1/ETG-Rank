<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#AAAAAA">[</font><font color="#FFAA00"><?php echo $config->get_dwarf_limits()['NAME_2'];?></font><font color="#AAAAAA">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_dwarf_limits()['NAME_2'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('dwarf',2);
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
           Dig, my friend DIG! <br>
           To get the <?php echo $config->get_dwarf_limits()['NAME_2'];?> rank you have to break more than <?php echo $config->get_dwarf_limits()['BROKEN_2'];?> blocks and place more than <?php echo $config->get_dwarf_limits()['PLACED_2'];?> blocks.
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can set 40 Warp's.</li>
          <li>Can use the <b>cave view</b> from <a href="http://www.minecraftforum.net/topic/482147-151-mar21-reis-minimap-v33-04/">Rei's Minimap.</a></li>
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