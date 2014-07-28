<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of server
 *
 * @author Gallaun
 */
class server {

    //Ban data
    private $bans_ID;
    private $bans_NAME;
    private $bans_DATE;
    
    //Stats data
    private $players;
    private $new_players;
    private $online_players;
    private $online_players_number;
    private $firstjoin;
    private $votes_tm;
    private $votes_lm;
    
    
    //Something else
    private $queries = 0;
    private $MySql_bans;
    private $MySql_stats;
    private $config;
    
    use ban, stats;
    
    public function __wakeup() {
        $this->config = new config();
        
        if($this->config->get_debug()){
        echo '__wakeup';
        $this->MySql_bans = new MySQL('TRUE', $this->config->get_banhammer_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_stats = new MySQL('TRUE', $this->config->get_statistics_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_vote = new MySQL('TRUE', $this->config->get_vote_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_rank = new MySQL('TRUE', $this->config->get_rank_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_perms = new MySQL('TRUE', $this->config->get_permissions_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        }
    }
    
    public function __sleep() {
        if($this->config->get_debug()) echo '__sleep';
        return array('bans_ID', 'bans_NAME', 'bans_DATE', 'new_players', 'firstjoin', 'votes_tm', 'votes_lm', 'players');
    }

    public function __construct() {
        $this->config = new config();
        $this->MySql_bans = new MySQL('TRUE', $this->config->get_banhammer_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_stats = new MySQL('TRUE', $this->config->get_statistics_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_vote = new MySQL('TRUE', $this->config->get_vote_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_rank = new MySQL('TRUE', $this->config->get_rank_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_perms = new MySQL('TRUE', $this->config->get_permissions_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        if($this->config->get_debug()){
            echo '__construnct';
            $this->MySql_bans->ThrowExceptions =  TRUE;
            $this->MySql_stats->ThrowExceptions =  TRUE;
            $this->MySql_vote->ThrowExceptions =  TRUE;
            $this->MySql_rank->ThrowExceptions =  TRUE;
            $this->MySql_perms->ThrowExceptions =  TRUE;
        }
    }
    
    public function __destruct() { 
        if($this->config->get_debug()) echo '__destrunct';
        $this->MySql_bans->close();
        $this->MySql_stats->close();
        $this->MySql_vote->close();
        $this->MySql_rank->close();
        $this->MySql_perms->close();
        if($this->get_debug()) echo"Database Qureies: $this->queries";
    }

//************************* Bans *********************************//    
    
   public function get_latest_bans_ID($number=4)
   {
     if(!isset($this->bans_ID)){
         $this->queries++;
         $help = $this->MySql_bans->QueryArray('SELECT player_id FROM banhammer_bans WHERE expires_at IS NULL AND state = 0 ORDER BY created_at DESC LIMIT 0,'.$number);
         for($i=0;$i<$number;$i++) {
         $help_[$i] = $help[$i][0];   
         }
         $this->bans_ID = $help_;
         return $help_;
         }
     else {
         return $this->bans_ID; 
     }
   }
   
    public function get_latest_bans_NAME($number=4)
   {
     if(!isset($this->bans_NAME)){
         $bans = $this->get_latest_bans_ID($number);
         for($i=0;$i<$number;$i++){
           $temp[$i] = $this->get_ban_name($bans[$i]);
         }
         $this->bans_NAME = $temp;
         return $temp;
     }
     else {
         return $this->bans_NAME; 
     }
   }
   
    public function get_latest_bans_DATE($number=4)
   {
     if(!isset($this->bans_DATE)){
         $bans = $this->get_latest_bans_ID($number);
         for($i=0;$i<$number;$i++){
           $temp[$i] = strtotime($this->get_ban_DATE($bans[$i]));
         }
         $this->bans_DATE = $temp;
         return $this->bans_DATE;
     }
     else {
         return $this->bans_DATE; 
     }
   }
 
   //************************* Stats *********************************// 
   
  public function get_all_players(){
     if(!isset($this->players)){
     $this->queries++;
     $this->players = array ("Name");
     $help =$this->MySql_perms->QueryArray("SELECT * FROM permissions where type = '1' AND permission = 'name'");
     foreach($help as $k){
       array_push($this->players, $k["value"]);
     }
     }
     return $this->players;
  }
   
   public function get_new_players_name($number=4){
         if(!isset($this->new_players)){
         $this->queries++;
         $help = $this->MySql_stats->QueryArray('SELECT name FROM stats_players ORDER BY first_login DESC LIMIT 0,'.$number);
         for($i=0;$i<$number;$i++) {
         $help_[$i] = $help[$i][0];   
         }
         $this->new_players = $help_;
         return $help_;
         }
     else {
         return $this->new_players; 
     }   
   }
   
  public function get_new_players_firstjoin($number=4)
   {
     if(!(isset($this->firstjoin))){
         $joins = $this->get_new_players_name($number);
         for($i=0;$i<$number;$i++){
           $temp[$i] = $this->get_join_date($joins[$i]);
         }
         $this->firstjoin = $temp;
         return $temp;
     }
     else {
         return $this->firstjoin; 
     }
   }
   
   public function get_online_players()
   {
      if(!isset($this->online_players)){
         $this->queries++;
         $help = $this->MySql_stats->QueryArray('SELECT name FROM stats_players WHERE online = "1"');
         if($help != NULL){
             $this->online_players_number = $this->MySql_stats->rowcount();
             for($i=0;$i<$this->online_players_number;$i++) {
                $help_[$i] = $help[$i][0];   
             }
         $this->online_players = $help_;
         return $help_;
         }
         else{
             $this->online_players_number = 0;
         }
      }
         return $this->online_players;  
   }
   
   public function get_online_players_number(){
       if(isset($this->online_players_number)){
            return $this->online_players_number;
       } else {
           $this->get_online_players();
           return $this->online_players_number;
       }
   } 
   
   public function get_debug(){
       return $this->config->get_debug();
   }
   
   public function get_max_players(){
       $this->queries++;
       return $this->MySql_stats->QuerySingleValue('SELECT value FROM stats_server_statistics WHERE `key` = "players_allowed"'); 
   }  
   
   public function get_entity_name($id){
       $this->queries++;
       return $this->MySql_stats->QuerySingleValue('SELECT tp_name FROM stats_entities WHERE `entity_id` = "'. $id .'"'); 
   }
   
    public function get_votes_tm($number=5){
         if(!isset($this->votes_tm)){
         $this->queries++;
         $this->votes_tm = $this->MySql_vote->QueryArray('
                                                        SELECT username, count(*) AS "votes" 
                                                        FROM votes 
                                                        WHERE 
                                                            MONTH(timestamp) = MONTH(CURDATE()) 
                                                            AND YEAR(timestamp) = YEAR(CURDATE()) 
                                                            AND (SELECT parent 
                                                                FROM permissions_inheritance 
                                                                WHERE 
                                                                child = (SELECT name 
                                                                        FROM permissions 
                                                                        WHERE 
                                                                            type = "1" 
                                                                            AND permission = "name" 
                                                                            AND value = username))
                                                            NOT IN ("mod", "admin", "owner")			
                                                        GROUP BY username 
                                                        ORDER BY votes DESC 
                                                        LIMIT 0,'.$number);
         if($this->votes_tm == NULL) $this->votes_tm = FALSE;
         return $this->votes_tm;
         }
     else {
         return $this->votes_tm; 
     } 
    }
     
     public function get_votes_lm($number=5){
         if(!isset($this->votes_lm)){
         $this->queries++;
         $this->votes_lm = $this->MySql_vote->QueryArray('SELECT username, count(*) AS "votes" FROM votes WHERE YEAR(timestamp) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(timestamp) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY username ORDER BY votes DESC LIMIT 0,'.$number);
         if($this->votes_lm == NULL) $this->votes_lm = FALSE;
         return $this->votes_lm;
         }
     else {
         return $this->votes_lm; 
     }  
   }
   
    public function get_votes_lm_player($name){
         $this->queries++;
         $votes = $this->MySql_vote->QuerySingleValue('SELECT count(*) AS "votes" FROM votes WHERE timestamp >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) AND timestamp <= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND username ="'.$name.'"'); 
         if($votes == NULL) $votes = 0;
         return $votes;
   }
   
   //************************* Rank *********************************// 
   
   public function get_playersbyrank($rank, $level){
         $this->queries++;
         $name = $this->MySql_rank->QueryArray('SELECT name FROM rank WHERE '.$rank.' = '.$level.' LIMIT 28');
         if($name == NULL) return FALSE;
         else return $name;
   }
}

?>
