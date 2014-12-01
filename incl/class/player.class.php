<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of player
 *
 * @author Gallaun
 */
class player {
   
        use stats, auth;
        
        //login data
        
        private $name;
        private $uuid;
        private $isloggedin;
        private $queries;
        private $actual_rank;
        //private $email;
        private $banid;
        private $bans;
        
        //stats
        
        private $playtime;
        private $stats_id;
        
        private $money;
        
        private $kills; //array [PVP] [PVE]
        private $ukills; //array [PVP] [PVE]
        private $kills_id; //array [ID] [kills]
        private $deaths; //array [PVP] [PVE]
        
        private $blocks; //array [broken] [placed]
        private $blocks_id; //array [ID] => [broken] [placed]
        
        private $distance; //array [waled] [travelled]
        
        private $donated;
        
        private $arch;
        
        private $votes_top;
        private $votes_tm;
        private $votes_lm;
        
        private $ranks;
        private $ranks_db;
    
        public function __wakeup() {
        $this->config = new config();
        
        //$this->MySql_authme = new MySQL('TRUE', $this->config->get_authme_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_stats = new MySQL('TRUE', $this->config->get_statistics_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_perms = new MySQL('TRUE', $this->config->get_permissions_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_shop = new MySQL('TRUE', $this->config->get_shop_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_forum = new MySQL('TRUE', $this->config->get_forum_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_bans = new MySQL('TRUE', $this->config->get_banhammer_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_iconomy = new MySQL('TRUE', $this->config->get_iconomy_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_rank = new MySQL('TRUE', $this->config->get_rank_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_vote = new MySQL('TRUE', $this->config->get_vote_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        
        if($this->config->get_debug()){
            echo '__wakeup Player </br>';
            //$this->MySql_authme->ThrowExceptions =  TRUE;
            $this->MySql_stats->ThrowExceptions =  TRUE;
            $this->MySql_perms->ThrowExceptions =  TRUE;
            $this->MySql_shop->ThrowExceptions =  TRUE;
            $this->MySql_forum->ThrowExceptions =  TRUE;
            $this->MySql_bans->ThrowExceptions =  TRUE;
            $this->MySql_iconomy->ThrowExceptions =  TRUE;
            $this->MySql_rank->ThrowExceptions =  TRUE;
            $this->MySql_vote->ThrowExceptions =  TRUE;
        }
        
        }
    
    public function __sleep() {
        if($this->config->get_debug()) echo '__sleep Player';
        //return array('name', 'isloggedin', 'actual_rank', 'email', 'bans', 'banid', 'money', 'kills','kills_id', 'ukills', 'deaths', 'blocks', 'blocks_id', 'distance', 'donated', 'arch', 'uuid', 'votes_top', 'votes_tm', 'votes_lm' );
        return array('name', 'isloggedin', 'uuid', 'stats_id');
    }  

    public function __construct($name=FALSE) {
        $this->config = new config();
        //$this->MySql_authme = new MySQL('TRUE', $this->config->get_authme_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_stats = new MySQL('TRUE', $this->config->get_statistics_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_perms = new MySQL('TRUE', $this->config->get_permissions_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_shop = new MySQL('TRUE', $this->config->get_shop_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_forum = new MySQL('TRUE', $this->config->get_forum_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_bans = new MySQL('TRUE', $this->config->get_banhammer_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_iconomy = new MySQL('TRUE', $this->config->get_iconomy_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_rank = new MySQL('TRUE', $this->config->get_rank_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        $this->MySql_vote = new MySQL('TRUE', $this->config->get_vote_database(), $this->config->get_host(), $this->config->get_username(), $this->config->get_password());
        if(!$name) $this->name = $name;
        if($this->config->get_debug()){
            echo '__construnct Player </br>';
            //$this->MySql_authme->ThrowExceptions =  TRUE;
            $this->MySql_stats->ThrowExceptions =  TRUE;
            $this->MySql_perms->ThrowExceptions =  TRUE;
            $this->MySql_shop->ThrowExceptions =  TRUE;
            $this->MySql_forum->ThrowExceptions =  TRUE;
            $this->MySql_bans->ThrowExceptions =  TRUE;
            $this->MySql_iconomy->ThrowExceptions =  TRUE;
            $this->MySql_rank->ThrowExceptions =  TRUE;
            $this->MySql_vote->ThrowExceptions =  TRUE;
        }
    }
    
    public function __destruct() { 
        //$this->MySql_authme->close();
        $this->MySql_stats->close();
        $this->MySql_perms->close();
        $this->MySql_shop->close();
        $this->MySql_forum->close();
        $this->MySql_bans->close();
        $this->MySql_iconomy->close();
        $this->MySql_rank->close();
        $this->MySql_vote->close();
        unset($this->name);
        unset($this->uuid);
        unset($this->stats_id);
        unset($this->isloggedin);
        if($this->config->get_debug()) echo '__destruct Player </br>';
        if($this->get_debug()) echo"Database Qureies: $this->queries </br>";
    }
    
// Login stuff ------------------------------------------------------------------------------------------------------------------------------------   
    
    public function do_login ($user, $password){
      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);

      // Benutzername und Passwort werden �berpr�ft
      if ($this->check_password($user,$password))
      {
       $this->isloggedin = TRUE;
       $this->name = $user;
       $this->uuid = $this->get_uuid();
       $this->stats_id = $this->get_stats_id();
       return true;
      }
      else
      {
       return false;
      }
    }
    
    public function is_loggedin()
    {
        if(isset($this->isloggedin)){
            if($this->isloggedin){
                return TRUE;
            }
        } else{
            return FALSE;
        }

    }
    
    public function logout()
    {
        unset($name);
        unset($isloggedin);
        session_destroy();
        return true;
    }
    
   /* public function has_emain()
    {
      if(!isset($this->actual_rank) AND $this->isloggedin){
         $this->queries++;
         $email = $this->MySql_authme->QuerySingleValue("SELECT email FROM authme where username = '$this->name'");
         if(!strcmp($email,'your@email.com')){
             echo '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> You have not set an E-Mail for password recovery! Set it now. <a class="btn btn-mini" href="?page=setemail" style="float:right;" type="button">Set E-Mail &raquo;</a> </div>';
         } else { 
             $this->email = $email;
         }
      }
    }*/
    
    public function set_name($name,$d = FALSE){
        if($this->MySql_perms->QuerySingleValue('SELECT * FROM permissions where value = "'.$name.'" AND permission = "name" AND type = "1"') != NULL OR $d){
        $this->name = $name;
        $this->uuid = $this->MySql_stats->QuerySingleValue("SELECT uuid FROM stats_players WHERE name = '". $this->name ."'");
        $this->stats_id = $this->MySql_stats->QuerySingleValue("SELECT player_id FROM stats_players WHERE uuid = '". $this->uuid ."'");
        return TRUE; 
        } else {
            $this->name = FALSE;
            return FALSE;
        }
    }
    
    public function name()
    {
        return $this->name;
    }
 
    public function uuid()
    {
        return $this->uuid;
    }
    
    public function stats_id()
    {
        return $this->stats_id;
    }
    
    public function has_access($page){
    if($this->isloggedin)
    {
     $perms = explode('_',$page);
     if($perms[0] == 'pages/mod')
      {
       $rank = $this->get_current_rank();
       if($rank == 'admin' || $rank == 'owner') return $page;
       else
       {
         echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> You do not have permissions to access this page! </div>';
         return 'pages/home.php';
       }
      }
     if($perms[0] == 'pages/owner')
      {
       $rank = $this->get_current_rank();
       if($rank == 'owner') return $page;
       else
       {
         echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> You do not have permissions to access this page! </div>';
         return 'pages/home.php';
       }
      }
    return $page;
    }
    else
    {
     echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Please log in to access this page! </div>';
     return 'pages/home.php';
    }
    }
    
//Password Manager--------------------------------------------------------------------------------------------------------------------------
 /*   
 public function change_pw_authme($oldpw,$newpw,$confpw){
   if((!strcmp($newpw,$confpw)))
   {
     if((strlen($newpw)>=5))
        {
            if($this->check_password($this->name,$oldpw))
            {
                $password_info = $this->MySql_authme->QuerySingleValue("SELECT password FROM authme where username = '".$this->name()."'");
                if($this->MySql_authme->rowcount() == 1 )
                {
                    $sha_info = explode("$",$password_info);
                } else return 4;
                if( $sha_info[1] === "SHA" )
                {
                    $salt = $sha_info[2];
                    $sha256_password = hash('sha256', $newpw);
                    $sha256_password .= $sha_info[2];;
                    $authme_pw =  '$'.$sha_info[1].'$'.$sha_info[2].'$'.hash('sha256', $sha256_password);
            
                    $values["password"] = $this->MySql_authme->SQLValue($authme_pw);
                    $where["username"] = $this->MySql_authme->SQLValue($this->name());
                    if($this->MySql_authme->UpdateRows("authme",$values,$where) != TRUE)
                    {
                        return 4;
                    } else return 0;
                } else return 4;    
            } else return 1;   
        }else return 3;
   }else return 2;
 }*/
 
  public function change_pw_shop($oldpw,$newpw,$confpw){
   if((!strcmp($newpw,$confpw)))
   {
     if((strlen($newpw)>=5))
        {
            if($this->check_password_shop($this->name,$oldpw))
            {
                $hash = md5($newpw);
                $values["password"] = $this->MySql_shop->SQLValue($hash);
                $where["playerName"] = $this->MySql_shop->SQLValue($this->name());
                if($this->MySql_shop->UpdateRows("wa_Players",$values,$where) != TRUE)
                {
                    return 4;
                } else return 0;
            } else return 1;    
        } else return 3;   
   }else return 2;
 }
 
 public function change_pw_forum($oldpw,$newpw,$confpw,$email){
   if((!strcmp($newpw,$confpw)))
   {
     if((strlen($newpw)>=5))
        {
            if($this->check_password_forum($email,$oldpw))
            {
                $t_hasher = new PasswordHash(8, TRUE);
                $hash = $t_hasher->HashPassword($newpw);
                $values["user_password"] = $this->MySql_forum->SQLValue($hash);
                $where["user_email"] = $this->MySql_forum->SQLValue($email);
                if($this->MySql_forum->UpdateRows("phpbb_users",$values,$where) != TRUE)
                {
                    return 4;
                } else return 0;
            } else return 1;    
        } else return 3;   
   }else return 2;
   echo "asdf";
 }
//Bans ------------------------------------------------------------------------------------------------------------------------------------   
 
 public function get_bans(){
     if(!isset($this->bans)){
         $this->queries++;
         $this->bans = $this->MySql_bans->QueryArray("SELECT * FROM banhammer_bans WHERE player_id = '". $this->get_ban_id() ."' ORDER BY id DESC");
         return $this->bans;   
         }
     else {
         return $this->bans; 
     } 
 }
 
  public function get_ban_id(){
      if(!isset($this->banid)){
          $this->queries++;
          $id=$this->MySql_bans->QuerySingleValue("SELECT id FROM banhammer_players WHERE name = '".$this->name."'");
          if($id != FALSE){
            $this->banid = $id;
            return $id;
          }
            else return 0;
      } else return $this->banid;
 }
    
//Ranks ------------------------------------------------------------------------------------------------------------------------------------  
    
    public function get_current_rank(){
     if(!isset($this->actual_rank)){
        $this->queries++;
        $this->actual_rank = $this->MySql_perms->QuerySingleValue("SELECT parent FROM permissions_inheritance WHERE child = '$this->uuid'");
        if ($this->actual_rank == NULL) $this->actual_rank = 'default';
     }
     return $this->actual_rank;
    }
    
    public function get_ranks_db(){
      if(!isset($this->ranks_db)){
          $this->queries++;
          $this->ranks_db = $this->MySql_rank->QueryArray("SELECT * FROM rank where uuid = '". $this->uuid ."' OR (name = '". $this->name ."' AND uuid IS NULL)")[0];
          if($this->ranks_db == NULL) $this->ranks_db = Array ( 'banker' => 0,
                                                                'warrior' => 0,
                                                                'dwarf' => 0,
                                                                'voyager' => 0,
                                                                'donator'=> 0,
                                                                'architect' => 0,
                                                                'don' => 0,
                                                                'voter' => 0,
                                                                'banker_lock' => 0,
                                                                'warrior_lock' => 0,
                                                                'dwarf_lock' => 0,
                                                                'voyager_lock' => 0,
                                                                'donator_lock'=> 0,
                                                                'architect_lock' => 0,
                                                                'don_lock' => 0,
                                                                'voter_lock' => 0,
                                                                'donated_money' => 0);
      }
      return $this->ranks_db;  
   }
    
    public function save_rank($rank, $level){
      if($this->MySql_rank->HasRecords("SELECT * FROM rank where name = '". $this->name ."' AND uuid IS NOT NULL"))
      {
        $values["name"] = $this->MySql_perms->SQLValue($this->name);
        $values["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
        $values[$rank] = $this->MySql_perms->SQLValue($level);
        $where["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
        if($this->MySql_rank->AutoInsertUpdate("rank",$values,$where)){
            return TRUE;
        } else {
            return FALSE;
        }  
      } else {
        $values["name"] = $this->MySql_perms->SQLValue($this->name);
        $values["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
        $values[$rank] = $this->MySql_perms->SQLValue($level);
        $where["name"] = $this->MySql_perms->SQLValue($this->name);
        if($this->MySql_rank->AutoInsertUpdate("rank",$values,$where)){
            return TRUE;
        } else {
            return FALSE;
        } 
      }
    }
    
   public function is_locked($rank){
      if($this->get_ranks_db()[$rank.'_lock'] == 1){
          return TRUE;
      } else {
         return FALSE;
     }     
    }
    
    public function lock_rank($rank){
      $values["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
      $values[$rank.'_lock'] = $this->MySql_perms->SQLValue('1');
      $where["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
      if($this->MySql_rank->AutoInsertUpdate("rank",$values,$where)){
          return TRUE;
      } else {
         return FALSE;
     }     
    }
    
     public function unlock_rank($rank){
      $values["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
      $values[$rank.'_lock'] = $this->MySql_perms->SQLValue('0');
      $where["uuid"] = $this->MySql_perms->SQLValue($this->uuid);
      if($this->MySql_rank->AutoInsertUpdate("rank",$values,$where)){
          return TRUE;
      } else {
         return FALSE;
     }     
    }
    
    public function set_rank($rank){
        if($this->get_current_rank() != 'owner' AND $this->get_current_rank() != 'mod' AND $this->get_current_rank() != 'admin'){
            send_message('pex user '.$this->name().' group set '.$rank, $this->name(), 'true');
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function get_debug(){
       return $this->config->get_debug();
   }
   
//Stats ------------------------------------------------------------------------------------------------------------------------------------
    private function get_uuid(){
      if(!isset($this->uuid)){
          $this->queries++;
          $this->uuid = $this->MySql_stats->QuerySingleValue("SELECT uuid FROM stats_players WHERE name = '". $this->name ."'");
      }
      return $this->uuid;  
   } 
   
   private function get_stats_id(){
      if(!isset($this->stats_id)){
          $this->queries++;
          $this->stats_id = $this->MySql_stats->QuerySingleValue("SELECT player_id FROM stats_players WHERE uuid = '". $this->uuid ."'");
      }
      return $this->stats_id;  
   }  
   
    private function get_playtime(){
      if(!isset($this->playtime)){
          $this->queries++;
          $this->playtime = $this->MySql_stats->QuerySingleValue("SELECT playtime FROM stats_players WHERE uuid = '". $this->get_stats_id() ."'");
      }
      return $this->playtime;  
   } 
   
   public function get_money(){
      if(!isset($this->money)){
          $this->queries++;
          $this->money = $this->MySql_iconomy->QuerySingleValue("SELECT cc3_balance.balance AS balance FROM cc3_balance JOIN cc3_account ON cc3_account.id = cc3_balance.username_id WHERE cc3_account.uuid = '". $this->uuid ."' AND cc3_balance.currency_id = 1 AND cc3_balance.worldName = 'default'");
      }
      return $this->money;  
   }
   
   public function get_kills(){
      if(!isset($this->kills)){
          $this->queries++;
          $this->kills['pvp'] = $this->MySql_stats->QuerySingleValue("SELECT SUM(times) AS kills FROM stats_total_pvp_kills WHERE player_id ='". $this->get_stats_id() ."'");
          if($this->kills['pvp'] == NULL) $this->kills['pvp'] = 0;
          $this->kills['pve'] = $this->MySql_stats->QuerySingleValue("SELECT SUM(creature_killed) AS kills FROM stats_total_pve_kills WHERE player_id = '". $this->get_stats_id() ."'");
          if($this->kills['pvp'] == NULL) $this->kills['pvp'] = 0;
      }
      return $this->kills; 
   }
   
   public function get_ukills(){
      if(!isset($this->ukills)){
          $this->queries++;
          $this->ukills['pvp'] = $this->MySql_stats->QuerySingleValue("SELECT COUNT(*) AS kills FROM stats_total_pvp_kills WHERE player_id ='". $this->get_stats_id() ."'");
          if($this->ukills['pvp'] == NULL) $this->ukills['pvp'] = 0;
          $this->ukills['pve'] = $this->MySql_stats->QuerySingleValue("SELECT COUNT(*) AS kills FROM stats_total_pve_kills WHERE player_id = '". $this->get_stats_id() ."'");
          if($this->ukills['pve'] == NULL) $this->ukills['pve'] = 0;
      }
      return $this->ukills;  
   }
   
   public function get_kills_id($id){ //$id array of mob ID's
       foreach($id as $k){
           if(!isset($this->kills_id[$k['id']])){
            $this->queries++;
            $this->kills_id[$k['id']] = $this->MySql_stats->QuerySingleValue("SELECT SUM(creature_killed) FROM stats_total_pve_kills WHERE player_id ='". $this->get_stats_id() ."' AND entity_id ='". $k['id'] ."' AND player_killed = '0'");
            if($this->kills_id[$k['id']] == NULL) $this->kills_id[$k['id']] = 0;
           }
       }
      return $this->kills_id;    
   }
   
   public function get_deaths(){
      if(!isset($this->deaths)){
          $this->queries++;
          $this->deaths['pvp'] = $this->MySql_stats->QuerySingleValue("SELECT SUM(times) AS deaths FROM stats_total_pvp_kills WHERE victim_id ='". $this->get_stats_id() ."'");
          $this->deaths['pve'] = $this->MySql_stats->QuerySingleValue("SELECT SUM(player_killed) AS deaths FROM stats_total_pve_kills WHERE player_id = '". $this->get_stats_id() ."'");
      }
      return $this->deaths;  
   }
   
   public function get_blocks(){
      if(!isset($this->blocks)){
          $this->queries++;
          $this->blocks = $this->MySql_stats->QueryArray("SELECT SUM(placed) AS placed, SUM(destroyed) AS broken  FROM stats_total_blocks WHERE player_id = '". $this->get_stats_id() ."'")[0];
      }
      return $this->blocks;  
   }
   
   public function get_blocks_id($id){ //$id array of block ID's
       $where = '';
       foreach($id as $k){
           if(!isset($this->blocks_id[$k['id']])){
               /*$block = explode('|',$k['id'],-1);
               $i = 0;
               $z = count($block);
               if($z != 0){
               foreach ($block as $l) {  //ertellen der WHERE bedingung für die blöcke | mit OR verknüpfen 
                   $i++;
                   $where = $where."material_id = '".$l."'";
                   if($i != $z) $where = $where.' OR ';
               }
               } else {
                   $where =  $where."material_id = '".$k["id"]."'";
               }*/
               $in = str_replace('|', "','", $k['id']); // build IN condition
               $this->queries++;
               $this->blocks_id[$k['id']] = $this->MySql_stats->QueryArray("SELECT SUM(placed) AS placed, SUM(destroyed) AS broken  FROM stats_total_blocks WHERE player_id = '". $this->get_stats_id() ."' AND material_id IN('".$in."')")[0];
               if($this->blocks_id[$k['id']] == NULL) $this->blocks_id[$k['id']] = 0;
           }
       $where = '';    
       }
      return $this->blocks_id;    
   }
   
   public function get_distance(){
      if(!isset($this->distance)){
          $this->queries++;
          $this->distance = $this->MySql_stats->QueryArray("SELECT SUM(foot+boat+minecart+ride+swim+flight) AS total, foot AS foot  FROM stats_distances WHERE player_id = '". $this->get_stats_id() ."'")[0];
      }
      return $this->distance;  
   }
   
   public function get_donated(){
      if(!isset($this->donated)){
          $this->queries++;
          $this->donated = $this->MySql_rank->QuerySingleValue("SELECT donated_money FROM rank where uuid = '". $this->uuid ."' OR (name = '". $this->name ."' AND uuid IS NULL)");
          if($this->donated == NULL) $this->donated = 0;
      }
      return $this->donated;  
   }
   
   public function get_arch(){
      if(!isset($this->arch)){
          $this->queries++;
          $this->arch = $this->MySql_rank->QuerySingleValue("SELECT architect FROM rank where uuid = '". $this->uuid ."' OR (name = '". $this->name ."' AND uuid IS NULL)");
          if($this->arch == NULL) $this->arch = 0;
      }
      return $this->arch;  
   }
   
    public function get_votes_tm(){
         if(!isset($this->votes_tm)){
         $this->queries++;
         $this->votes_tm = $this->MySql_vote->QueryArray('SELECT username, count(*) AS "votes" FROM votes WHERE MONTH(timestamp) = MONTH(CURDATE()) AND YEAR(timestamp) = YEAR(CURDATE()) AND username = "'.$this->name.'"')[0];
         return $this->votes_tm;
         }
     else {
         return $this->votes_tm; 
     } 
    }
    
    public function get_votes_lm(){
         if(!isset($this->votes_lm)){
         $this->queries++;
         $this->votes_lm = $this->MySql_vote->QueryArray('SELECT username, count(*) AS "votes" FROM votes WHERE timestamp >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) AND timestamp <= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND username = "'.$this->name.'"')[0];
         if($this->votes_lm == NULL) $this->votes_lm = 0;
         return $this->votes_lm;
         }
     else {
         return $this->votes_lm; 
     } 
    }
    
     public function get_top_votes_lm(){
         if(!isset($this->votes_top)){
         $this->queries++;
         $this->votes_top = $this->MySql_vote->QueryArray('
                                                        SELECT username, count(*) AS "votes" 
                                                        FROM votes 
                                                        WHERE 
                                                            YEAR(timestamp) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
                                                            AND MONTH(timestamp) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
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
                                                        LIMIT 0,3'); 
         if ($this->votes_top == NULL) {
                $this->votes_top = FALSE;
            }
            return $this->votes_top;
         }
     else {
         return $this->votes_top; 
     }  
     }
   
   public function get_ranks(){
      if(!isset($this->ranks)){
          // BUILDER *****************************
          if($this->config->get_builder_limits()['ONTIME'] < $this->get_playtime()){
          foreach($this->config->get_builder_limits()['BLOCKS'] AS $k){
              $help = $this->get_blocks_id($this->config->get_builder_limits()['BLOCKS']);
              if($k['placed'] > $help[$k['id']]['placed'] OR $k['broken'] > $help[$k['id']]['broken']){
                  $this->ranks['builder'][1] = FALSE;
                  break ;
              } 
              $this->ranks['builder'][1] = TRUE;     
          }
          } else $this->ranks['builder'][1] = FALSE;
          
          // BANKER ******************************
          if($this->get_money() > $this->config->get_banker_limits()['MONEY_3']) $this->ranks['banker'][3] = TRUE; else $this->ranks['banker'][3] = FALSE;
          if($this->get_money() > $this->config->get_banker_limits()['MONEY_2']) $this->ranks['banker'][2] = TRUE; else $this->ranks['banker'][2] = FALSE;
          if($this->get_money() > $this->config->get_banker_limits()['MONEY_1']) $this->ranks['banker'][1] = TRUE; else $this->ranks['banker'][1] = FALSE;
          
          // WARRIOR******************************
          foreach($this->config->get_warrior_limits()['KILLS'] AS $k){
              $help = $this->get_kills_id($this->config->get_warrior_limits()['KILLS']);
              if($k['number'] > $help[$k['id']]){
                  $this->ranks['warrior'][1] = FALSE;
                  break ;
              } 
              $this->ranks['warrior'][1] = TRUE;
          }
          
          if($this->get_ukills()['pvp'] > $this->config->get_warrior_limits()['UKILLS_2'] AND $this->get_kills()['pvp'] >  $this->config->get_warrior_limits()['KILLS_2'] AND calculate_kd($this->get_kills()['pvp'], $this->get_deaths()['pvp']) > $this->config->get_warrior_limits()['KD_2'] AND $this->ranks['warrior'][1]) $this->ranks['warrior'][2] = TRUE; else $this->ranks['warrior'][2] = FALSE; 
          if($this->get_ukills()['pvp'] > $this->config->get_warrior_limits()['UKILLS_3'] AND $this->get_kills()['pvp'] >  $this->config->get_warrior_limits()['KILLS_3'] AND calculate_kd($this->get_kills()['pvp'], $this->get_deaths()['pvp'] + $this->get_deaths()['pve']) > $this->config->get_warrior_limits()['KD_3'] AND $this->ranks['warrior'][1]) $this->ranks['warrior'][3] = TRUE; else $this->ranks['warrior'][3] = FALSE; 
          
          // DWARF *******************************
          if($this->get_blocks()['placed'] > $this->config->get_dwarf_limits()['PLACED_3'] AND $this->get_blocks()['broken'] > $this->config->get_dwarf_limits()['BROKEN_3']) $this->ranks['dwarf'][3] = TRUE; else $this->ranks['dwarf'][3] = FALSE;
          if($this->get_blocks()['placed'] > $this->config->get_dwarf_limits()['PLACED_2'] AND $this->get_blocks()['broken'] > $this->config->get_dwarf_limits()['BROKEN_2']) $this->ranks['dwarf'][2] = TRUE; else $this->ranks['dwarf'][2] = FALSE;
          if($this->get_blocks()['placed'] > $this->config->get_dwarf_limits()['PLACED_1'] AND $this->get_blocks()['broken'] > $this->config->get_dwarf_limits()['BROKEN_1']) $this->ranks['dwarf'][1] = TRUE; else $this->ranks['dwarf'][1] = FALSE;
          
          // VOYAGER ******************************
          if($this->get_distance()['total'] > $this->config->get_voyager_limits()['TOTAL_3'] AND $this->get_distance()['foot'] > $this->config->get_voyager_limits()['WALKED_3']) $this->ranks['voyager'][3] = TRUE; else $this->ranks['voyager'][3] = FALSE;
          if($this->get_distance()['total'] > $this->config->get_voyager_limits()['TOTAL_2'] AND $this->get_distance()['foot'] > $this->config->get_voyager_limits()['WALKED_2']) $this->ranks['voyager'][2] = TRUE; else $this->ranks['voyager'][2] = FALSE;
          if($this->get_distance()['total'] > $this->config->get_voyager_limits()['TOTAL_1'] AND $this->get_distance()['foot'] > $this->config->get_voyager_limits()['WALKED_1']) $this->ranks['voyager'][1] = TRUE; else $this->ranks['voyager'][1] = FALSE;
          
          // ARCHITECT*****************************
          if($this->get_arch() == 3) $this->ranks['architect'][3] = TRUE; else $this->ranks['architect'][3] = FALSE;
          if($this->get_arch() == 2) $this->ranks['architect'][2] = TRUE; else $this->ranks['architect'][2] = FALSE;
          if($this->get_arch() == 1) $this->ranks['architect'][1] = TRUE; else $this->ranks['architect'][1] = FALSE;
          
          // DONATOR *****************************          
          if($this->get_donated() >= $this->config->get_donator_limits()['MONEY_2']) $this->ranks['donator'][2] = TRUE; else $this->ranks['donator'][2] = FALSE;
          if($this->get_donated() >= $this->config->get_donator_limits()['MONEY_1']) $this->ranks['donator'][1] = TRUE; else $this->ranks['donator'][1] = FALSE;
          
          // VOTE KING ****************************
          foreach($this->get_top_votes_lm() AS $u){
          if(!strcmp($this->name,$u['username'])){
            $this->ranks['voter'][1] = TRUE;
            break;
          } else {
            $this->ranks['voter'][1] = FALSE;  
          }          
          }
          
          // DON **********************************
          if($this->ranks['banker'][3] AND $this->ranks['warrior'][3] AND $this->ranks['dwarf'][3] AND $this->ranks['voyager'][3] AND $this->ranks['architect'][3]) $this->ranks['don'][1] = TRUE; else $this->ranks['don'][1] = FALSE;
         
      }
      return $this->ranks;  
   }
   
}

?>
