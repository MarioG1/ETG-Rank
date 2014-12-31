 <?php
 
 //clicked on an locked button
  if(isset($_POST["locked"])){
      echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> This rank is locked because of cheating. For more informations ask an Admin or an Mod.</div>';
  }
   
 // Set rank to banker
   if(isset($_POST["banker"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['banker'][3]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_banker_limits()['NAME_3'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_banker_limits()['PERM_3']);
          $player->save_rank('banker', 3);
      }
      elseif ($player->get_ranks()['banker'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_banker_limits()['NAME_2'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_banker_limits()['PERM_2']);
          $player->save_rank('banker', 2);
      }
      elseif ($player->get_ranks()['banker'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_banker_limits()['NAME_1'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_banker_limits()['PERM_1']);
          $player->save_rank('banker', 1);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Banker.</div>';
     }
    }
    
    // Set rank to voyager
    if(isset($_POST["voyager"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['voyager'][3]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_voyager_limits()['NAME_3'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_voyager_limits()['PERM_3']);
      }
      elseif ($player->get_ranks()['voyager'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_voyager_limits()['NAME_2'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_voyager_limits()['PERM_2']);
      }
      elseif ($player->get_ranks()['voyager'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_voyager_limits()['NAME_1'].'</b> please reconnect to apply changes! </div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_voyager_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Voyager.</div>';
     }
    }
    
    // Set rank to donator
    if(isset($_POST["donator"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if ($player->get_ranks()['donator'][1]){
          if(isset($_POST["do_ranks"])){
              $rank = explode("_", $_POST["do_ranks"])[0];
              $lvl = explode("_", $_POST["do_ranks"])[1];
              if($player->get_ranks()[$rank][$lvl]){
                    echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_donator_limits()['NAME_2'].'</b> please reconnect to apply changes! </div>';
                    echo $rank." : ".$lvl;
                    $player->set_rank($config->get_rank_perm($rank,$lvl));
                    $player->set_prefix($config->get_rank_prefix('donator',1));
              }
          }
      }
      elseif ($player->get_ranks()['donator'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_donator_limits()['NAME_1'].'</b> please reconnect to apply changes! </div>';
          $player->set_rank($config->get_donator_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Donator.</div>';
     }
    }
    
    // Set rank to Architekt
    if(isset($_POST["architect"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['architect'][3]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_architect_limits()['NAME_3'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_architect_limits()['PERM_3']);
      }
      elseif ($player->get_ranks()['architect'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_architect_limits()['NAME_2'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_architect_limits()['PERM_2']);
      }
      elseif ($player->get_ranks()['architect'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_architect_limits()['NAME_1'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_architect_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Architect.</div>';
     }
    }
    
    // Set rank to Dwarf
    if(isset($_POST["dwarf"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['dwarf'][3]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_dwarf_limits()['NAME_3'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_dwarf_limits()['PERM_3']);
      }
      elseif ($player->get_ranks()['dwarf'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_dwarf_limits()['NAME_2'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_dwarf_limits()['PERM_2']);
      }
      elseif ($player->get_ranks()['dwarf'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_dwarf_limits()['NAME_1'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_dwarf_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Dwarf.</div>';
     }
    }
    
    // Set rank to warrior or warlord
    if(isset($_POST["warrior"]))
   {
     if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['warrior'][3]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_warrior_limits()['NAME_3'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_warrior_limits()['PERM_3']);
      }
      elseif ($player->get_ranks()['warrior'][2]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_warrior_limits()['NAME_2'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_warrior_limits()['PERM_2']);
      }
      elseif ($player->get_ranks()['warrior'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_warrior_limits()['NAME_1'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_warrior_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Warrior.</div>';
     }
    }
    
   // Set rank to Don
    if(isset($_POST["don"]))
   {
      if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['don'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_don_limits()['NAME_1'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_don_limits()['PERM_1']);
     }
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Don.</div>';
     }
    }
   } 
    
   // Set rank to Voter    
    if(isset($_POST["voter"]))
   {
      if($player->get_current_rank() != 'owner' AND $player->get_current_rank() != 'mod' AND $player->get_current_rank() != 'admin')
     {
      if($player->get_ranks()['voter'][1]){
          echo'<div class="alert alert-success"> Your are now a <b>'.$config->get_voter_limits()['NAME_1'].'</b></div>';
          $player->set_prefix('""');
          $player->set_rank($config->get_voter_limits()['PERM_1']);
     }}
     else
     {
      echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Can not set an '.$player->get_current_rank().' to an Vote King.</div>';
    }
   } 

 ?>

 <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Rank Selection</h1>
        <p>You are now on the rank Selection Page. If you achieved the Builder rank you have the possibility to get a higher rank. There are several ranks available depending on your skills. Below you can select all available ranks for you.</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
		<div class="thumbnail">
                    <?php
                        if($player->get_ranks()['banker'][3]){
                            include './pages/tiles/banker/banker3.php';
                        }
                        elseif ($player->get_ranks()['banker'][2]){
                            include './pages/tiles/banker/banker2.php';
                        }
                        elseif ($player->get_ranks()['banker'][1]){
                            include './pages/tiles/banker/banker1.php';
                        }
                        else{
                            include './pages/tiles/banker/banker0.php';
                        }
                    ?>
                </div>
        </div>
        <div class="span4" float="right" >
            <div class="thumbnail">
                    <?php
                        if($player->get_ranks()['warrior'][3]){
                            include './pages/tiles/warrior/warrior3.php';
                        }
                        elseif ($player->get_ranks()['warrior'][2]){
                            include './pages/tiles/warrior/warrior2.php';
                        }
                        elseif ($player->get_ranks()['warrior'][1]){
                            include './pages/tiles/warrior/warrior1.php';
                        }
                        else{
                            include './pages/tiles/warrior/warrior0.php';
                        }
                    ?>
            </div>
        </div>
         <div class="span4" float="right" >
	 <div class="thumbnail">
                    <?php
                        if($player->get_ranks()['dwarf'][3]){
                            include './pages/tiles/dwarf/dwarf3.php';
                        }
                        elseif ($player->get_ranks()['dwarf'][2]){
                            include './pages/tiles/dwarf/dwarf2.php';
                        }
                        elseif ($player->get_ranks()['dwarf'][1]){
                            include './pages/tiles/dwarf/dwarf1.php';
                        }
                        else{
                            include './pages/tiles/dwarf/dwarf0.php';
                        }
                    ?>
          
         </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="span4">
            <div class="thumbnail">
                    <?php
                        if($player->get_ranks()['voyager'][3]){
                            include './pages/tiles/voyager/voyager3.php';
                        }
                        elseif ($player->get_ranks()['voyager'][2]){
                            include './pages/tiles/voyager/voyager2.php';
                        }
                        elseif ($player->get_ranks()['voyager'][1]){
                            include './pages/tiles/voyager/voyager1.php';
                        }
                        else{
                            include './pages/tiles/voyager/voyager0.php';
                        }
                    ?>
            </div>
        </div>
         <div class="span4" float="right" >
            <div class="thumbnail">
                    <?php
                        if ($player->get_ranks()['donator'][2]){
                            include './pages/tiles/donator/donator2.php';
                        }
                        elseif ($player->get_ranks()['donator'][1]){
                            include './pages/tiles/donator/donator1.php';
                        }
                        else{
                            include './pages/tiles/donator/donator0.php';
                        }
                    ?>
            </div>
        </div>
         <div class="span4" float="right" >
            <div class="thumbnail">
                    <?php
                        if($player->get_ranks()['architect'][3]){
                            include './pages/tiles/architect/architect3.php';
                        }
                        elseif ($player->get_ranks()['architect'][2]){
                            include './pages/tiles/architect/architect2.php';
                        }
                        elseif ($player->get_ranks()['architect'][1]){
                            include './pages/tiles/architect/architect1.php';
                        }
                        else{
                            include './pages/tiles/architect/architect0.php';
                        }
                    ?>
            </div>
    </div>
      </div>
     <hr>
    <div class="row">
        <div class="span4" float="right" >
            <div class="thumbnail">
                    <?php
                            include './pages/tiles/vote/vote.php';
                    ?>
            </div>
        </div>
        <div class="span8">
            <div class="thumbnail">
             <h2>Don</h2> 
                <h4>
                    <table width="100%">
                     <tr>
                          <td aling="left"><?php echo $config->get_banker_limits()['NAME_3']?></td>
                          <td align="center"><img src="./images/<?php if($player->get_ranks()['banker'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                          <td aling="left"><?php echo $config->get_voyager_limits()['NAME_3']?></td>
                          <td align="center"><img src="./images/<?php if($player->get_ranks()['voyager'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                     </tr>
                     <tr>
                          <td aling="left"><?php echo $config->get_warrior_limits()['NAME_3']?></td>
                          <td align="center"><img src="./images/<?php if($player->get_ranks()['warrior'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                          <td aling="left"><?php echo $config->get_dwarf_limits()['NAME_3']?></td>
                          <td align="center"><img src="./images/<?php if($player->get_ranks()['dwarf'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>
                      </tr>
                      <tr>
                          <td aling="left"><?php echo $config->get_architect_limits()['NAME_3']?></td>
                          <td align="center"><img src="./images/<?php if($player->get_ranks()['architect'][3]){echo "yes";} else{ echo "no";} ?>.png" width="32" height="32"></td>                  
                      </tr>
                    </table>
                 </h4>   
          <p>Don is the highest available rank on our server. To become a “Don” you have to get all other not payed ranks on the highest possible levels (master level) (Architect, Warlord, Millionaire, Dwarf, Voyager). As a Don you can choose a custom name prefix.</p>
          <p><form method="POST"><?php draw_button($player,'don',1)?></from>&nbsp;<a class="btn" href="?page=don">View details &raquo;</a></p>
            </div>    
        </div>       
    </div>
    <hr>