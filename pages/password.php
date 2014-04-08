 <!-- Change Server Password -->

 <?php
 /*
 if(isset($_POST["server_change"]))
  {
     switch($player->change_pw_authme($_POST["server_pw_old"],$_POST["server_pw_new"],$_POST["server_pw_new_conf"]))
     {
         case 0: 
             echo'<div class="alert alert-success"> Password Changed! </div>';
             break;
         case 1:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Wrong Server Password! </div>';
             break;
         case 2:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password dont match! </div>';
             break;
         case 3:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password is to short! </div>';
             break;
         default:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Something went wrong! Please contact an admin. </div>';
             break;  
     }
  }*/
?>

 <!-- Change Forum Password -->

 <?php
 if(isset($_POST["phpbb_change"]))
  {
     switch($player->change_pw_forum($_POST["phpbb_pw_old"],$_POST["phpbb_pw_new"],$_POST["phpbb_pw_new_conf"],$_POST["phpbb_email"]))
     {
         case 0: 
             echo'<div class="alert alert-success"> Password Changed! </div>';
             break;
         case 1:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Wrong Forum Password! </div>';
             break;
         case 2:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password dont match! </div>';
             break;
         case 3:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password is to short! </div>';
             break;
         default:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Something went wrong! Please contact an admin. </div>';
             break;  
     }
  }
?>

 <!-- Change Shop Password -->

 <?php
 if(isset($_POST["shop_change"]))
  {
     switch($player->change_pw_shop($_POST["shop_pw_old"],$_POST["shop_pw_new"],$_POST["shop_pw_new_conf"]))
     {
         case 0: 
             echo'<div class="alert alert-success"> Password Changed! </div>';
             break;
         case 1:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Wrong Shop Password! </div>';
             break;
         case 2:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password dont match! </div>';
             break;
         case 3:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Password is to short! </div>';
             break;
         default:
             echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Something went wrong! Please contact an admin. </div>';
             break;  
     }
  }
?>

 <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Password Management</h1>
        <br>
        <p>You can manage all your ETG password's below.</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
       <!-- <div class="span4">
		<div class="thumbnail">
          <h2>Server</h2>
          <h5>Old Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Old Password" name="server_pw_old"></from></p>
          <h5>New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="New Password" name="server_pw_new"></from></p>
          <h5>Confirm New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Confirm Password" name="server_pw_new_conf"></from></p>
          <p><form method="POST"><button type="submit" class="btn" name="server_change">Change It! &raquo;</button></from></p>
        </div>
		</div><-->
        <div class="span6">
		<div class="thumbnail">
          <h2>Shop</h2>
          <h5>Old Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Old Password" name="shop_pw_old"></from></p>
          <h5>New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="New Password" name="shop_pw_new"></from></p>
          <h5>Confirm New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Confirm Password" name="shop_pw_new_conf"></from></p>
          <p><form method="POST"><button type="submit" class="btn" name="shop_change">Change It! &raquo;</button></from></p>
       </div>
	   </div>
        <div class="span6">
		<div class="thumbnail">
          <h2>Forum</h2>
          <h5>E-Mail</h5>
          <p><form method="POST"><input class="span2" type="text" placeholder="E-Mail" name="phpbb_email"></from></p>
          <h5>Old Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Old Password" name="phpbb_pw_old"></from></p>
          <h5>New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="New Password" name="phpbb_pw_new"></from></p>
          <h5>Confirm New Password</h5>
          <p><form method="POST"><input class="span2" type="password" placeholder="Confirm Password" name="phpbb_pw_new_conf"></from></p>
          <p><form method="POST"><button type="submit" class="btn" name="phpbb_change">Change It! &raquo;</button></from></p>
        </div>
		</div>
      </div>

      <hr>