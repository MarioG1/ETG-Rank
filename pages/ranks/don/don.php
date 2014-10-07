<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#000000">[</font><font color="#00AA00"><?php echo $config->get_don_limits()['NAME_1'];?></font><font color="#000000">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_don_limits()['NAME_1'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('don',1);
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
           The Don rank is last rank on this server. <br>
           If you want to be a "Don" you have to get all non payed ranks (Millionaire, Warlord, Dwarf, Voyager, Genius).<br>
           As a Don you can choose a custome name prefix.
          </p>
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
          <li>Can set 80 Warp's.</li>
          <li>Can use a custom name prefix.</li>
          <li>Can use World Guard to protect your buildings.</li>
          <li>Can use SRM to sell World Guard regions.</li>
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
<hr>