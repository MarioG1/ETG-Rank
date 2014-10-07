<!-- Main hero unit for a primary marketing message or call to action -->

     <div class="row">
     <div class="span9"> <div class="hero-unit">
        <h1><font color="#AA0000">[</font><font color="#FF5555"><?php echo $config->get_architect_limits()['NAME_3'];?></font><font color="#AA0000">]</font></h1>
     </div> </div>
     <div class ="span3">
         <h4>Current <?php echo $config->get_architect_limits()['NAME_3'];?>'s:</h4>
         <?php
          $names=$server->get_playersbyrank('architect',3);
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
              For being a genius you have to build very nice and big houses, and you have to be a redstone engineer too.
          </p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Abilities:</h2>
          <ul>
          <li>Can create Web Auction Signs.</li>
          <li>Can link warps to buttons/pressure plates.</li>
          <li>Can set 40 Warp's.</li>
          <li>Can teleport to other player.</li>
          <li>Can teleport other player to him.</li>
          <li>Can create <a href="#marker_modal" role="button" data-toggle="modal">marker signs</a>.</li> 
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
       <img src="https://camo.githubusercontent.com/9db598a2984ee843180041450e7292f284208624/687474703a2f2f6d696b657072696d6d2e636f6d2f696d616765732f4d61726b6572732e706e67"></img>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

      <hr>