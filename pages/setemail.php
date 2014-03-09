<?php
 if(isset($_POST["set"]))
 {
  if($_POST["email"] != '' & $_POST["cemail"] != '')
   {
    if(strcmp($_POST["email"],$_POST["cemail"]))
    {
     set_email($_SESSION['name'],$_POST["email"]);
     echo'<div class="alert alert-success"> E-Mail successfully changed!</div>';
    }
    else echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> E-Mails dont match! </div>';
   }
   else echo'<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> Please enter your E-Mail twice! </div>';
  }
?>
<!-- Main hero unit for a primary marketing message or call to action -->
     <div class="page-header">
         <h1>E-Mail<small> Below you can set your E-Mail for password recovery</small></h1>
     </div>

      <!-- Example row of columns -->
      <div class="row">
	  <div class="span12">
	  <div class="thumbnail">
        <div style="margin-left: 30px;">
        <h4>Set an Email:</h4>
        <form class="form-inline" method="POST">
        <input class="span2" type="text" placeholder="E-Mail" name="email">
        <input class="span2" type="text" placeholder="Confirm E-Mail" name="cemail">
        <button type="submit" class="btn" name="set">Change It! &raquo;</button>
        </from>
        </br></br>
        <p>Your E-Mail is only use for password recovery you won't get any spam E-Mail's or Advertisement's</p>
        <p>Once you have set your E-Mail you can use <b>/email recovery <your E-mail></b> bevore login and we will send you your password immediately.</p>
        </div>
		</div>
      </div>
	  </div>

      <hr>