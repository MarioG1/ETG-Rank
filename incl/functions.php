<?php

// STATS ***********************************************************************

function calculate_kd($kills,$deaths){
    if($deaths != 0) return round(($kills/$deaths),2);
    else return $kills;  
}

function calculate_proz($value, $hp){
    if($hp != 0){
        $proz = round((100/$hp)*$value,2);
            if($proz > 100){
                return 100;
            }
            else{
                return $proz;
            }
    }
    else return 0;    
}

function calculate_vote_ratio($tm, $lm){
    if($tm-$lm >= 0){
        return calculate_proz($tm, $lm);
    }
    else{
        return -calculate_proz($lm-$tm, $lm);
    }   
}

// SKIN RENDERING **************************************************************

function get_face($name) {

    $fileformat = '.png';
    $urltofolder = 'http://map.etg-clan.at/tiles/faces/32x32/';
    $url = $urltofolder.$name.$fileformat;
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($statusCode == 200) {
            $ret = $url;
        }
        else
        {
         $ret = "http://map.etg-clan.at/tiles/faces/32x32/Default.png";
        }
    }

    curl_close($curl);

    return $ret;
}

//PAGE STUFF *******************************************************************

  function draw_button($player,$rank,$level)
   {
     if($level != 0){
        $valid = $player->get_ranks()[$rank][$level]; 
     }else{
         $valid = FALSE;
     }
      
     if($player->is_locked($rank)){
       if($valid){
           echo '<button type="submit" class="btn btn-danger disabled" name="locked" disabled="disabled">Rank Locked!</button>';
       }else{
           echo '<button type="submit" class="btn btn-danger disabled" name="locked" disabled="disabled">Rank Locked!</button>';
       }
     }else{
      if($valid){
          echo '<button type="submit" class="btn btn-primary" name="'.$rank.'">Choose Rank&raquo;</button>';   
      }else{
          echo '<button type="submit" class="btn btn-primary disabled" name="" disabled="disabled">Choose Rank&raquo;</button>'; 
      }
     }
     
   }

//RANK STUFF *******************************************************************
   
   function create_typeahead_string($name_array)
    {
     $i=0;
     $typeahead_string = '';
     foreach ($name_array as $v)
     {
       $formatted_name    =  '"'.$name_array[$i].'",';
       $typeahead_string .= $formatted_name;
       $i++;
     }

     $option_list = rtrim($typeahead_string, ",");  //Strips the last comma and any whitespace from the end string
     return $option_list;
    }
    
//SEND MESSAGE *****************************************************************
 
    function send_message($message,$player='false',$command='false'){
        $chatJSON		=	'/var/www/minecraft/rank/etc/chat/webinChat.json';
        $timeZone		=	"Europe/Vienna";

        date_default_timezone_set($timeZone);
        
        if($message){
            $json	=	file_get_contents($chatJSON);
            $data	=	json_decode($json,true);
            $data[]	=	array('message'=>  $message,'time'=>date('D M j G:i:s T Y'),'source'=>'out','player'=>$player,'command'=>$command);
            $json	=	json_encode($data);
            $fh		=	fopen($chatJSON,'w+');
            fwrite($fh, $json);
            fclose($fh);
            return TRUE;
        }else{ return FALSE;}
    }


?>
