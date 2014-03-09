<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ban
 *
 * @author Gallaun
 */
trait ban {
       
   public function get_ban_name($id){
       $this->queries++;
       return $this->MySql_bans->QuerySingleValue('SELECT name FROM banhammer_players WHERE id = '. $id);   
   }
   
   public function get_ban_date($id){
       $this->queries++;
       return $this->MySql_bans->QuerySingleValue('SELECT created_at FROM banhammer_bans WHERE player_id = '.$id.' AND state = 0 ORDER BY id DESC');   
   }
}

?>
