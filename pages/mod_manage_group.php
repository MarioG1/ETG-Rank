<?php

  if (isset($_SESSION['S_Player'])){
       $s_player = unserialize($_SESSION['S_Player']);
  }
    else {
      $s_player = new player();  
    }

if(isset($_POST["search"]))
   {
    if(isset($_POST["player"]) AND $_POST["player"] != '')
     {
         if(!$s_player->set_name($_POST["player"]))
         {
         $s_player->set_name(FALSE);
         echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Player '.$_POST["player"].' not found in database!</div>';
         }
      }
    else echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please enter a player name!</div>';
   }

if(isset($_POST["save"]))
   {
         if(isset($_POST["optionsDonator"])){
             $optionsDonator = $_POST["optionsDonator"];
             $donatedmoney = $_POST["donatedmoney"];
             if($optionsDonator == 1 && $donatedmoney == NULL) $donatedmoney = 5;
             if($optionsDonator == 2 && $donatedmoney == NULL) $donatedmoney = 25;
         } else{
             if($donatedmoney >= 5) $optionsDonator = 1;
             if($donatedmoney >= 25) $optionsDonator = 2;
         }
         
         if(isset($_POST["optionsArchitect"])) $optionsArchitect = $_POST["optionsArchitect"]; else $optionsArchitect = 0;
         
         if(isset($_POST["lockBanker"])) $s_player->lock_rank('banker'); else $s_player->unlock_rank('banker');
         if(isset($_POST["lockWarrior"])) $s_player->lock_rank('warrior'); else $s_player->unlock_rank('warrior');
         if(isset($_POST["lockDwarf"])) $s_player->lock_rank('dwarf'); else $s_player->unlock_rank('dwarf');
         if(isset($_POST["lockVoter"])) $s_player->lock_rank('voter'); else $s_player->unlock_rank('voter');
         if(isset($_POST["lockVoyager"])) $s_player->lock_rank('voyager'); else $s_player->unlock_rank('voyager');
         if(isset($_POST["lockDonator"])) $s_player->lock_rank('donator'); else $s_player->unlock_rank('donator'); 
         if(isset($_POST["lockArchitect"])) $s_player->lock_rank('architect'); else $s_player->unlock_rank('architect');
         if(isset($_POST["lockDon"])|isset($_POST["lockBanker"])|isset($_POST["lockWarrior"])|isset($_POST["lockDwarf"])|isset($_POST["lockVoyager"])|isset($_POST["lockArchitect"])) $s_player->lock_rank('don'); else $s_player->unlock_rank('don');

         if($s_player->name())
         {
          if(!$s_player->save_rank('donator', $optionsDonator)){
          }elseif (!$s_player->save_rank('architect', $optionsArchitect)){
          }elseif (!$s_player->save_rank('donated_money', $donatedmoney)){
            echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please enter a player name!</div>';  
          } else echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Changes Saved!</div>';
     }
   }  


?>
 <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Player Manager</h1>
      </div>

      <!-- Example row of columns -->
      <div class="row">
         <div class ="span12">
              <div class="well">
               <h3> Enter the name of the player you want to edit below: </h3>
               <form class="form-search" method="POST">
               <input type="text" autocomplete="off" name="player" data-provide="typeahead" data-items="4" data-source='[<?php echo create_typeahead_string($server->get_all_players()); ?>]'>
               <button type="submit" class="btn" name="search">Search</button>
               </form>
              </div>
         </div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Donator</h2>
         <h4>Allow Donator Rank</h4>
         <form method="POST"><label class="radio">
         <input type="checkbox" name="optionsDonator" id="optionsRadios1" value="1" <?php if($s_player->get_ranks()['donator'][1]) echo "checked"; ?>>
         <?php echo $config->get_donator_limits()['NAME_1'];?>
         </label>
         <label class="radio">
         <input type="checkbox" name="optionsDonator" id="optionsRadios2" value="2" <?php if($s_player->get_ranks()['donator'][2]) echo "checked"; ?>>
         <?php echo $config->get_donator_limits()['NAME_2'];?>
         </label>
         <br>
         <h4>Donated Money</h4>
           <div class="input-prepend input-append">
                <span class="add-on">&euro;</span>
                <input class="span2" name="donatedmoney" type="text" value="<?php echo $s_player->get_donated(); ?>">
                <span class="add-on">.00</span>
           </div>
          </p>
          <p><button type="submit" class="btn" name="save">Save Changes &raquo;</button></from></p>
        </div>
		</div>
        <div class="span4">
		<div class="thumbnail">
          <h2>Architect</h2>
          <h4>Allow Architect Rank</h4>
         <form method="POST"><label class="radio">
         <input type="radio" name="optionsArchitect" id="optionsRadios1" value="1" <?php if($s_player->get_ranks()['architect'][1]) echo "checked"; ?>>
         <?php echo $config->get_architect_limits()['NAME_1'];?>
         </label>
         <label class="radio">
         <input type="radio" name="optionsArchitect" id="optionsRadios2" value="2" <?php if($s_player->get_ranks()['architect'][2]) echo "checked"; ?>>
         <?php echo $config->get_architect_limits()['NAME_2'];?>
         </label>
         <label class="radio">
         <input type="radio" name="optionsArchitect" id="optionsRadios2" value="3" <?php if($s_player->get_ranks()['architect'][3]) echo "checked"; ?>>
         <?php echo $config->get_architect_limits()['NAME_3'];?>
         </label>
         <br>
          <p><button type="submit" class="btn" name="save">Save Changes &raquo;</button></from></p>
       </div>
	   </div>
        <div class="span4">
		<div class="thumbnail">
          <h2><p align="center">
          <?php
           if($s_player->name())
           {
           echo $s_player->name();
           echo '<input type="hidden" name="player" value="'.$s_player->name().'"/>';
           }
           else
           {
           echo "No Player selected";
           }
           ?>
           </p></h2>
          <p><p align="center"><img class="skin" src="http://shop.etg-clan.at/?page=mcskin&user=<?php echo $s_player->name() ?>&view=body"></p></p>
       </div>
        </div>  
      </div>
      <hr>
      <div class="row">
       <div class="span6">
        <div class="thumbnail">
           <h2>Ranks:</h2>
          <h4>
              <table width="100%">
                <tr>
                    <td aling="center"></td>
                    <td align="center">I</td>
                    <td align="center">II</td>
                    <td align="center">III</td>
                    <td align="center"><div style ="padding-left: 20px">Lock</div></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td aling="left">Banker:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['banker'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['banker'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['banker'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockBanker" id="optionsRadios2" value="3" <?php if($s_player->is_locked('banker')) echo "checked"; ?>></label></td>
                </tr>
                <tr>
                    <td aling="left">Warrior:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['warrior'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['warrior'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['warrior'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockWarrior" id="optionsRadios2" value="3" <?php if($s_player->is_locked('warrior')) echo "checked"; ?>></label></td>
                </tr>
                <tr>
                    <td aling="left">Dwarf:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['dwarf'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['dwarf'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['dwarf'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockDwarf" id="optionsRadios2" value="3" <?php if($s_player->is_locked('dwarf')) echo "checked"; ?>></label></td>
                </tr>
                 <tr>
                    <td aling="left">Vote King:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['voter'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center">---</td>
                    <td align="center">---</td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockVoter" id="optionsRadios2" value="3" <?php if($s_player->is_locked('voter')) echo "checked"; ?>></label></td>
                </tr>
              </table>
              </br>
              <p><button type="submit" class="btn" name="save">Save Changes &raquo;</button></from></p>
          </h4>
        </div>
      </div>
       <div class="span6">
        <div class="thumbnail">
           <h2>Ranks:</h2>
          <h4>
              <table width="100%">
                <tr>
                    <td aling="center"></td>
                    <td align="center">I</td>
                    <td align="center">II</td>
                    <td align="center">III</td>
                    <td align="center"><div style ="padding-left: 20px">Lock</div></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td aling="left">Voyager:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['voyager'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['voyager'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['voyager'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockVoyager" id="optionsRadios2" value="3" <?php if($s_player->is_locked('voyager')) echo "checked"; ?>></label></td>
                </tr>
                <tr>
                    <td aling="left">Donator:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['donator'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['donator'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center">---</td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockDonator" id="optionsRadios2" value="3" <?php if($s_player->is_locked('donator')) echo "checked"; ?>></label></td>
                </tr>
                <tr>
                    <td aling="left">Architect:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['architect'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['architect'][2]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['architect'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockArchitect" id="optionsRadios2" value="3" <?php if($s_player->is_locked('architect')) echo "checked"; ?>></label></td>
                </tr>
                 <tr>
                    <td aling="left">Don:</td>
                    <td align="center"><img src="./images/<?php if($s_player->get_ranks()['don'][1]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                    <td align="center">---</td>
                    <td align="center">---</td>
                    <td align="center"><label class="radio"><input type="checkbox" name="lockDon" id="optionsRadios2" value="3" <?php if($s_player->is_locked('don')) echo "checked"; ?>></label></td>
                </tr>
              </table>
              </br>
              <p><button type="submit" class="btn" name="save">Save Changes &raquo;</button></from></p>
          </h4>
        </div>
      </div>
      </div>

      <hr>
      
      <?php
            $_SESSION['S_Player'] = serialize($s_player);
      ?>