<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#AA0000">[</font><font color="#FF5555"><?php echo $config->get_architect_limits()['NAME_1'];?></font><font color="#AA0000">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_architect_limits()['NAME_1'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('architect',1);
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
           Architect is a special rank on our server. If you want to become an architect you have to build a huge and very nice building. <br>
           <h4>Examples:</h4>
           <ul>
           <li>_RobinK_'s <a href="http://map.etg-clan.at/index.html?worldname=Builder&mapname=surface&zoom=5&x=53.608807813457354&y=64&z=-537.178907867903">Church </a>(warp Kirche)</li>
           <li>bluelighter's <a href="http://map.etg-clan.at/index.html?worldname=Builder&mapname=surface&zoom=5&x=3641.8547424050694&y=64&z=-361.78385267316276">Taj Mahal</a> (warp taj)</li>
           <li>Mandaras's <a href="http://map.etg-clan.at/index.html?worldname=Builder&mapname=surface&zoom=5&x=-643.6395700963726&y=64&z=122.51062731925161">Sphinx</a> (warp sphinx)</li>
           </ul>
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can create Web Auction Signs.</li>
          <li>Can link warps to buttons/pressure plates.</li>
          <li>Can teleport to other player.</li>
          <li>Can teleport other player to him.</li>
          <li>Can create <a href="#marker_modal" role="button" data-toggle="modal">marker signs</a>.</li> 
          <li>Can build on the special <a href="http://minecraft.gamepedia.com/Amplified">Amplified Terrain</a> map.</li>
          </ul>
       </div>
	   </div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Commands:</h2>
          <ul>
          <li>All Builder commands</li>
          <li><b>/link</b></li>
          <li><b>/to</b> name</li>
          <li><b>/from</b> name</li>
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