<?php
  $time_start = microtime(true);
  session_start();
  
  //include all needed class files
 function __autoload($class_name) {
    include '../incl/class/' . $class_name . '.class.php';
 }
 
$config = new config();

  if (isset($_SESSION['Player'])){
  $player = unserialize($_SESSION['Player']);
  if ($player->get_current_rank() == 'owner')
  {
 
 $MySql_authme = new MySQL('TRUE', $config->get_authme_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_stats = new MySQL('TRUE', $config->get_statistics_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_perms = new MySQL('TRUE', $config->get_permissions_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_shop = new MySQL('TRUE', $config->get_shop_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_bans = new MySQL('TRUE', $config->get_banhammer_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_iconomy = new MySQL('TRUE', $config->get_iconomy_database(), $config->get_host(), $config->get_username(), $config->get_password());
 $MySql_rank = new MySQL('TRUE', $config->get_rank_database(), $config->get_host(), $config->get_username(), $config->get_password());

if(isset($_POST["time"]) AND $_POST["data"] == 'player_number'){
    $date = new DateTime($_POST["time"]);
    $time = $date->getTimestamp()*1000;
    $players = $MySql_authme->QueryArray("SELECT username FROM authme where lastlogin < $time");
    if($players != NULL){
    $number = $MySql_authme->RowCount();
    }
    else $number = 0;
    echo $number;
} 
 
if(isset($_POST["time"]) AND $_POST["data"] != 'player_number'){
    $date = new DateTime($_POST["time"]);
    $time = $date->getTimestamp()*1000;
    $players = $MySql_authme->QueryArray("SELECT username FROM authme where lastlogin < $time");
    $number = $MySql_authme->RowCount();
    if($players != NULL){
    foreach ($players as $k){
        $name = $k["username"];
        switch ($_POST["data"]) {
            case 'all':
                purge_iconomy($name,$MySql_iconomy);
                purge_bans($name, $MySql_bans);
                purge_perms($name, $MySql_perms);
                purge_rank($name, $MySql_rank);
                purge_shop($name, $MySql_shop);
                purge_stats($name, $MySql_stats);
                purge_authme($name, $MySql_authme);
                break;
            case 'stats':
                purge_stats($name, $MySql_stats);
                break;
            case 'ban':
                purge_bans($name, $MySql_bans);
                break;
            case 'perms':
                purge_perms($name, $MySql_perms);
                break;
            case 'shop':
                purge_shop($name, $MySql_shop);
                break;
            case 'ico':
                purge_iconomy($name,$MySql_iconomy);
                break;
            default:
                echo 'Error! Unsupportet purge type <b>'.$_POST['data'].'</b>';
                die();
                break;
        }      
    }
       $time_end = microtime(true);
       $time = $time_end - $time_start;
       echo $number.' Players purged with 0 errorsin '.number_format($time, 3, ',', '.').'s';
    } else {
        echo "0 Players deleted.";
    } 
}

if(isset($_POST["name"])){
        $name = $_POST["name"];
        switch ($_POST["data"]) {
            case 'all':
                purge_iconomy($name,$MySql_iconomy);
                purge_bans($name, $MySql_bans);
                purge_perms($name, $MySql_perms);
                purge_rank($name, $MySql_rank);
                purge_shop($name, $MySql_shop);
                purge_stats($name, $MySql_stats);
                purge_authme($name, $MySql_authme);
                break;
            case 'stats':
                purge_stats($name, $MySql_stats);
                break;
            case 'ban':
                purge_bans($name, $MySql_bans);
                break;
            case 'perms':
                purge_perms($name, $MySql_perms);
                break;
            case 'shop':
                purge_shop($name, $MySql_shop);
                break;
            case 'ico':
                purge_iconomy($name,$MySql_iconomy);
                break;
            default:
                echo 'Error! Unsupportet purge type <b>'.$_POST['data'].'</b>';
                die();
                break; 
        }
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        echo 'Player data purged with 0 errors in '.number_format($time, 3, ',', '.').'s';
        
        $MySql_authme->close();
        $MySql_stats->close();
        $MySql_perms->close();
        $MySql_shop->close();
        $MySql_bans->close();
        $MySql_iconomy->close();
        $MySql_rank->close();

}
  }
  }
  
function purge_iconomy($name,$db){
   $filter["username"] = $db->SQLValue($name);
   if(!$db->DeleteRows("iconomy", $filter)) $db->Kill(); 
   unset($filter);
}

function purge_bans($name,$db){
    $id = $db->QuerySingleValue("SELECT id FROM banhammer_players WHERE name = '".$name."'");
    if($id != NULL)
    {
      $filter1["name"] = $db->SQLValue($name);
      $filter2["player_id"] = $db->SQLValue($id);
	  if(!$db->Query("SET FOREIGN_KEY_CHECKS=0")) $db->Kill();
      if(!$db->DeleteRows("banhammer_bans", $filter2)) $db->Kill();
	  if(!$db->DeleteRows("banhammer_players", $filter1)) $db->Kill();
	  if(!$db->Query("SET FOREIGN_KEY_CHECKS=1")) $db->Kill(); 
      unset($filter1);
      unset($filter2);
    }   
}

function purge_perms($name,$db){
      $filter1["name"] = $db->SQLValue($name);
      $filter1["type"] = 1;
      $filter2["child"] = $db->SQLValue($name);
      $filter2["type"] = 1;
      if(!$db->DeleteRows("permissions_entity", $filter1)) $db->Kill(); 
      if(!$db->DeleteRows("permissions_inheritance", $filter2)) $db->Kill(); 
      unset($filter1);
      unset($filter2);
}

function purge_rank($name, $db){
    $filter["name"] = $db->SQLValue($name);
    if(!$db->DeleteRows("rank", $filter)) $db->Kill();
    unset($filter);
}

function purge_shop($name,$db){
   $filter1["playerName"] = $db->SQLValue($name);
   if(!$db->DeleteRows("wa_auctions", $filter1)) $db->Kill(); 
   if(!$db->DeleteRows("wa_items", $filter1)) $db->Kill(); 
   if(!$db->DeleteRows("wa_players", $filter1)) $db->Kill(); 
   $filter2["seller"] = $db->SQLValue($name);
   if(!$db->DeleteRows("wa_logsales", $filter2)) $db->Kill(); 
   $filter3["buyer"] = $db->SQLValue($name);
   if(!$db->DeleteRows("wa_logsales", $filter3)) $db->Kill(); 
   unset($filter1);
   unset($filter2);
   unset($filter3);
}

function purge_stats($name,$db){
     $id = $db->QuerySingleValue("SELECT player_id FROM stats_players WHERE name = '". $name ."'");
    if($id != NULL)
    {
        $filter1["player_id"] = $db->SQLValue($id);
        if(!$db->DeleteRows("stats_detailed_death_players", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_destroyed_blocks", $filter1)) $db->Kill(); 
        if(!$db->DeleteRows("stats_detailed_dropped_items", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_log_players", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_pickedup_items", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_placed_blocks", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_pve_kills", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_pvp_kills", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_used_items", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_distances", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_misc_info_players", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_player_inventories", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_total_blocks", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_total_deaths", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_total_items", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_total_pve_kills", $filter1)) $db->Kill();
        if(!$db->DeleteRows("stats_total_pvp_kills", $filter1)) $db->Kill();
        
        $filter2["victim_id"] = $db->SQLValue($id);
        if(!$db->DeleteRows("stats_total_pvp_kills", $filter2)) $db->Kill();
        if(!$db->DeleteRows("stats_detailed_pvp_kills", $filter1)) $db->Kill();
        
        if(!$db->DeleteRows("stats_players", $filter1)) $db->Kill();
        unset($filter1);
        unset($filter2);
    }   
}

function purge_authme($name,$db){
   $filter["username"] = $db->SQLValue($name);
   if(!$db->DeleteRows("authme", $filter)) $db->Kill(); 
   unset($filter);    
}
?>