<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stats
 *
 * @author Gallaun
 */
trait stats {
       public function get_join_date($name){
       $this->queries++;
       return $this->MySql_stats->QuerySingleValue('SELECT first_login FROM stats_players where name="'.$name.'"');   
   }
}

?>
