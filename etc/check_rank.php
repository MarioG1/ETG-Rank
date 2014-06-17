<?php
  //include all needed class files
  function __autoload($class_name) {
    include '../incl/class/' . $class_name . '.class.php';
 }

if($_GET["id"]=='12asd3d4d5as6') {
  include'../incl/functions.php';
  $server = new server();
  $config = new config();
  

  $onlineplayers = $server->get_online_players();
  $online_number = $server->get_online_players_number();
   
  echo'There are '.$online_number.' players online. </br>';
  
     if($online_number != 0)
     {
     for($i=0;$i<$online_number;$i++)
     {
      $player = new player();
      $player->set_name($onlineplayers[$i], TRUE);
      $a_ranks = $player->get_ranks_db();
      $n_ranks = $player->get_ranks();
      
      echo '</br>Running checks for player: '.$player->name().' => '.$player->get_current_rank().':  ';
      if($player->get_current_rank() == 'default' AND $n_ranks['builder'][1]){
      $player->set_rank ($config->get_builder_limits()['PERM_1']);         
      send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 was promoted to '.$config->get_builder_limits()['NAME_1'].'!');
      }
      else{
      
      //Promote--- ----------------------------------------------------------------------------------------------
      
          //Banker ----------------------------------------------------------------------------------------------
          if($a_ranks['banker'] == 2){
              if($n_ranks['banker'][3]){$player->save_rank('banker', 3); echo'Unlocked Banker 3'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_banker_limits()['NAME_3'].'!');} 
          }
          elseif($a_ranks['banker'] == 1){
              if($n_ranks['banker'][2]){$player->save_rank('banker', 2); echo'Unlocked Banker 2'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_banker_limits()['NAME_2'].'!');} 
          }
          elseif($a_ranks['banker'] == 0){
              if($n_ranks['banker'][1]){$player->save_rank('banker', 1); echo'Unlocked Banker 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_banker_limits()['NAME_1'].'!');} 
          }
          //Warrior ----------------------------------------------------------------------------------------------
          if($a_ranks['warrior'] == 2){
              if($n_ranks['warrior'][3]){$player->save_rank('warrior', 3); echo'Unlocked Warrior 3'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_warrior_limits()['NAME_3'].'!');} 
          }
          elseif($a_ranks['warrior'] == 1){
              if($n_ranks['warrior'][2]){$player->save_rank('warrior', 2); echo'Unlocked Warrior 2'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_warrior_limits()['NAME_2'].'!');} 
          }
          elseif($a_ranks['warrior'] == 0){
              if($n_ranks['warrior'][1]){$player->save_rank('warrior', 1); echo'Unlocked Warrior 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_warrior_limits()['NAME_1'].'!');} 
          }
          //Dwarf ----------------------------------------------------------------------------------------------
          if($a_ranks['dwarf'] == 2){
              if($n_ranks['dwarf'][3]){$player->save_rank('dwarf', 3); echo'Unlocked Dwarf 3'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_dwarf_limits()['NAME_3'].'!');}
          }
          elseif($a_ranks['dwarf'] == 1){
              if($n_ranks['dwarf'][2]){$player->save_rank('dwarf', 2); echo'Unlocked Dwarf 2'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_dwarf_limits()['NAME_2'].'!');}
          }
          elseif($a_ranks['dwarf'] == 0){
              if($n_ranks['dwarf'][1]){$player->save_rank('dwarf', 1); echo'Unlocked Dwarf 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_dwarf_limits()['NAME_1'].'!');}
          }
          //Voyager ----------------------------------------------------------------------------------------------
          if($a_ranks['voyager'] == 2){
              if($n_ranks['voyager'][3]){$player->save_rank('voyager', 3); echo'Unlocked Voyager 3'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_voyager_limits()['NAME_3'].'!');} 
          }
          elseif($a_ranks['voyager'] == 1){
              if($n_ranks['voyager'][2]){$player->save_rank('voyager', 2); echo'Unlocked Voyager 2'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_voyager_limits()['NAME_2'].'!');} 
          }
          elseif($a_ranks['voyager'] == 0){
              if($n_ranks['voyager'][1]){$player->save_rank('voyager', 1); echo'Unlocked Voyager 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_voyager_limits()['NAME_1'].'!');} 
          } 
          //Don ----------------------------------------------------------------------------------------------
          if($a_ranks['don'] == 0){
              if($n_ranks['don'][1]){$player->save_rank('don', 1); echo'Unlocked Don 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_don_limits()['NAME_1'].'!');} 
          }
          //Voter ----------------------------------------------------------------------------------------------
          if($a_ranks['voter'] == 0){
              if($n_ranks['voter'][1]){$player->save_rank('voter', 1); echo'Unlocked Voter 1'; send_message('&5[INFO] &6Congratulation! &4'.$player->name().'&6 unlocked '.$config->get_voter_limits()['NAME_1'].'!');} 
          }
          
      //Demote -------------------------------------------------------------------------------------------------
       
          //Banker ----------------------------------------------------------------------------------------------
          if($player->is_locked('banker') && ($player->get_current_rank() == $config->get_banker_limits()['PERM_3'] || $player->get_current_rank() == $config->get_banker_limits()['PERM_2'] || $player->get_current_rank() == $config->get_banker_limits()['PERM_1'])){
              echo'Banker is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          if($a_ranks['banker'] == 3){
              if(!$n_ranks['banker'][3]){
                  $player->save_rank('banker', 2); 
                  if($player->get_current_rank() == $config->get_banker_limits()['PERM_3'])$player->set_rank ($config->get_banker_limits()['PERM_2']);
                  echo'Locked Banker 3';   
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_banker_limits()['NAME_3'].' rank!',$player->name());
              } 
          }
          elseif($a_ranks['banker'] == 2){
              if(!$n_ranks['banker'][2]){
                  $player->save_rank('banker', 1); 
                  echo'Locked Banker 2';
                  if($player->get_current_rank() == $config->get_banker_limits()['PERM_2'])$player->set_rank ($config->get_banker_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_banker_limits()['NAME_2'].' rank!',$player->name());
              } 
          }
          elseif($a_ranks['banker'] == 1){
              if(!$n_ranks['banker'][1]){
                  $player->save_rank('banker', 0); 
                  echo'Locked Banker 1';
                  if($player->get_current_rank() == $config->get_banker_limits()['PERM_1'])$player->set_rank ($config->get_builder_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_banker_limits()['NAME_1'].' rank!',$player->name());
              } 
          }
          //Warrior ----------------------------------------------------------------------------------------------
          if($player->is_locked('warrior') && ($player->get_current_rank() == $config->get_warrior_limits()['PERM_3'] || $player->get_current_rank() == $config->get_warrior_limits()['PERM_2'] || $player->get_current_rank() == $config->get_warrior_limits()['PERM_1'])){
              echo'Warrior is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          if($a_ranks['warrior'] == 3){
              if(!$n_ranks['warrior'][3]){
                  $player->save_rank('warrior', 2); 
                  if($player->get_current_rank() == $config->get_warrior_limits()['PERM_3']) $player->set_rank ($config->get_warrior_limits()['PERM_2']);
                  echo'Locked Warrior 3';   
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_warrior_limits()['NAME_3'].' rank!',$player->name());
              } 
          }
          elseif($a_ranks['warrior'] == 2){
              if(!$n_ranks['warrior'][2]){
                  $player->save_rank('warrior', 1); 
                  echo'Locked Warrior 2';
                  if($player->get_current_rank() == $config->get_warrior_limits()['PERM_2']) $player->set_rank ($config->get_warrior_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_warrior_limits()['NAME_2'].' rank!',$player->name());
              } 
          }
          elseif($a_ranks['warrior'] == 1){
              if(!$n_ranks['warrior'][1]){
                  $player->save_rank('warrior', 0); 
                  echo'Locked Warrior 1';
                  if($player->get_current_rank() == $config->get_warrior_limits()['PERM_1']) $player->set_rank ($config->get_builder_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_warrior_limits()['NAME_1'].' rank!',$player->name());
              } 
          }
          //Don ----------------------------------------------------------------------------------------------
          if($player->is_locked('don') && $player->get_current_rank() == $config->get_don_limits()['PERM_1']){
              echo'Don is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          if($a_ranks['don'] == 1){
              if(!$n_ranks['don'][1]){
                  $player->save_rank('don', 0); 
                  echo'Locked Don 1';
                  if($player->get_current_rank() == $config->get_don_limits()['PERM_1']) $player->set_rank ($config->get_builder_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_don_limits()['NAME_1'].' rank!',$player->name());
              } 
          }
          //Voter ----------------------------------------------------------------------------------------------
          if($player->is_locked('voter') && ($player->get_current_rank() == $config->get_voter_limits()['PERM_3'] || $player->get_current_rank() == $config->get_voter_limits()['PERM_2'] || $player->get_current_rank() == $config->get_voter_limits()['PERM_1'])){
              echo'Voter is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          if($a_ranks['voter'] == 1){
              if(!$n_ranks['voter'][1]){
                  $player->save_rank('voter', 0); 
                  echo'Locked Voter 1';
                  if($player->get_current_rank() == $config->get_voter_limits()['PERM_1']) $player->set_rank ($config->get_builder_limits()['PERM_1']);
                  send_message('&5[INFO] &6Sorry! &4You&6 lost the '.$config->get_voter_limits()['NAME_1'].' rank!',$player->name());
              } 
          }
                    
          //Dwarf ----------------------------------------------------------------------------------------------
          if($player->is_locked('dwarf') && ($player->get_current_rank() == $config->get_dwarf_limits()['PERM_3'] || $player->get_current_rank() == $config->get_dwarf_limits()['PERM_2'] || $player->get_current_rank() == $config->get_dwarf_limits()['PERM_1'])){
              echo'Dwarf is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          
          //Voyager ----------------------------------------------------------------------------------------------
          if($player->is_locked('voyager') && ($player->get_current_rank() == $config->get_voyager_limits()['PERM_3'] || $player->get_current_rank() == $config->get_voyager_limits()['PERM_2'] || $player->get_current_rank() == $config->get_voyager_limits()['PERM_1'])){
              echo'Voyager is locked for this player';
              send_message('&5[INFO] &6Sorry! &4Due to cheating your actual rank ist locked!',$player->name());
              $player->set_rank ($config->get_builder_limits()['PERM_1']);         
          }
          
          
      }
     }
     unset($player);
     }
     else echo"No Players Online!";
} 

?>