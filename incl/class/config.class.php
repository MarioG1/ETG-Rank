<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author Gallaun
 */
class config {
    
    private $ini_array;
    
    public function __construct() {
        $this->ini_array = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config.ini', TRUE);
    }
    
    public function __destruct() {
        unset($this->ini_array);
    }
    
    public function get_host(){
        return $this->ini_array['Server']['HOST'];
    }
    
    public function get_debug(){
        if(strcmp($this->ini_array['Settings']['DEBUG'], "TRUE")){
            return FALSE;
        }
        else return TRUE;
    }
    
    public function get_cachetime(){
        return $this->ini_array['Cache']['TIME'];
    }
    
    public function get_username(){
        return $this->ini_array['Server']['USERNAME'];
    }
    
    public function get_password(){
        return $this->ini_array['Server']['PASSWORD'];
    }
    
    public function get_banhammer_database(){
        return $this->ini_array['Banhammer']['DATABASE'];
    }
    
    public function get_authme_database(){
        return $this->ini_array['AuthMe']['DATABASE'];
    }
    
    public function get_iconomy_database(){
        return $this->ini_array['IConomy']['DATABASE'];
    }
    
    public function get_statistics_database(){
        return $this->ini_array['Statistics']['DATABASE'];
    }
    
    public function get_shop_database(){
        return $this->ini_array['Shop']['DATABASE'];
    }
    
    public function get_rank_database(){
        return $this->ini_array['Rank']['DATABASE'];
    }
   
    public function get_vote_database(){
        return $this->ini_array['Vote']['DATABASE'];
    }

    public function get_permissions_database(){
        return $this->ini_array['Permissions']['DATABASE'];
    }
    
    public function get_forum_database(){
        return $this->ini_array['Forum']['DATABASE'];
    }
  
   public function get_builder_limits(){
       $help = $this->ini_array['Builder']['BLOCKS'];
       $limit = $this->ini_array['Builder'];
       $i = 0;
       foreach($help as $k){
           $limit['BLOCKS'][$i] = array( 'id' => explode(',', $help[$i])[0],
                                         'placed' => explode(',', $help[$i])[1],
                                         'broken' => explode(',', $help[$i])[2]);
           $i++;
       }
       return $limit; 
    }
    
   public function get_banker_limits(){
        return $this->ini_array['Banker'];
    }
    
   public function get_warrior_limits(){
       $help = $this->ini_array['Warrior']['KILLS'];
       $limit = $this->ini_array['Warrior'];
       $i = 0;
       foreach($help as $k){
           $limit['KILLS'][$i] = array( 'id' => explode(',', $help[$i])[0],
                               'number' => explode(',', $help[$i])[1]);
           $i++;
       }
       return $limit;     
    }
    
   public function get_dwarf_limits(){
        return $this->ini_array['Dwarf'];
    }
    
   public function get_voyager_limits(){
        return $this->ini_array['Voyager'];
    }
    
   public function get_donator_limits(){
        return $this->ini_array['Donator'];
    }
    
   public function get_architect_limits(){
        return $this->ini_array['Architect'];
    }
    
   public function get_don_limits(){
        return $this->ini_array['Don'];
    }
    
   public function get_voter_limits(){
        return $this->ini_array['Voter'];
    }
        
}

?>
