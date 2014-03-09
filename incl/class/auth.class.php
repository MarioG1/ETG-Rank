<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author Gallaun
 */
trait auth {
    
     private function check_password($nickname,$password) {

     $password_info = $this->MySql_authme->QuerySingleValue("SELECT password FROM authme where username = '".$nickname."'");
     if($this->MySql_authme->rowcount() == 1 )
     {
       $sha_info = explode("$",$password_info);
      }    
      else return FALSE;
      if( $sha_info[1] === "SHA" )
      {
       $salt = $sha_info[2];
       $sha256_password = hash('sha256', $password);
       $sha256_password .= $sha_info[2];;
      if( strcasecmp(trim($sha_info[3]),hash('sha256', $sha256_password) ) == 0 ) return TRUE;
      else return FALSE;
      }
    }
    
     private function check_password_shop($nickname,$password) {

     $hash_db = $this->MySql_shop->QuerySingleValue("SELECT password FROM wa_players WHERE playerName = '$nickname'");
     if($this->MySql_shop->rowcount() == 1)
     {
      $hash_pw=md5($password);
      if(strcasecmp($hash_db, $hash_pw)) return false;
      else return true;
     }
     else return false;
    }
    
    private function check_password_forum($email,$password) {

    $hash = $this->MySql_forum->QuerySingleValue("SELECT user_password FROM phpbb_users WHERE user_email = '$email'");
    if($this->MySql_forum->rowcount() == 1)
     {
      $t_hasher = new PasswordHash(8, TRUE);
      $check = $t_hasher->CheckPassword($password, $hash);
      return $check;
     }
     else return false;
  }
}

?>
