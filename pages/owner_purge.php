<?php
  if(isset($_POST["start_name"]) AND $_POST["player"] != ''){
      
  } elseif(isset($_POST["start_name"])){
      echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please enter a player name!</div>';
  }

  if(isset($_POST["start_time"]) AND $_POST["inactive"] != ''){
      
  } elseif(isset($_POST["start_time"])){
      echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Please enter a valid date!</div>';
  }
?>
<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Purge</h1>
        <p>Below you can purge all player data from inactive players.<br>Be careful pugres can't be undone.</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span6">
            <div class="thumbnail">
                <h2>Purge by Name</h2>
                <h3>Enter the player name below: </h3>
                <form class="form-search" method="POST">
                    <input type="text" autocomplete="off" name="player" data-provide="typeahead" data-items="4" id="sel_name" data-source='[<?php echo create_typeahead_string($server->get_all_players()); ?>]'>  
                <h3>What kind of data do you want to purge: </h3>
                <label class="radio">
                <input type="radio" name="purgebyname" id="purgebyname" value="all" checked>
                    All
                </label><br>
                 <label class="radio">
                <input type="radio" name="purgebyname" id="purgebyname" value="stats">
                    Stats only
                </label><br>
                <label class="radio">
                <input type="radio" name="purgebyname" id="purgebyname" value="ban">
                    Bans only
                </label><br>
                <label class="radio">
                <input type="radio" name="purgebyname" id="purgebyname" value="perms">
                    Permissions only
                </label><br>
                <input type="radio" name="purgebyname" id="purgebyname" value="shop">
                    Shop only
                </label><br>
                <input type="radio" name="purgebyname" id="purgebyname" value="ico">
                    iConomy only
                </label><br><br>
                <a href="#name" role="button" class="btn btn-warning" data-toggle="modal" id="purgebyname_button">Start &raquo;</a></form>
            </div>
        </div>
        <div class="span6">
            <div class="thumbnail">
                <h2>Purge by Time</h2>
                <h3>Incactive since:</h3>
                <form class="form-search" method="POST" name="time">
                <input type="date" name="inactive" id="date">    
                <h3>What kind of data do you want to purge: </h3>
                <label class="radio">
                <input type="radio" name="purgebytime" id="purgebytime" value="all" checked>
                    All
                </label><br>
                 <label class="radio">
                <input type="radio" name="purgebytime" id="purgebytime" value="stats">
                    Stats only
                </label><br>
                <label class="radio">
                <input type="radio" name="purgebytime" id="purgebytime" value="ban">
                    Bans only
                </label><br>
                <label class="radio">
                <input type="radio" name="purgebytime" id="purgebytime" value="perms">
                    Permissions only
                </label><br>
                <input type="radio" name="purgebytime" id="purgebytime" value="shop">
                    Shop only
                </label><br>
                <input type="radio" name="purgebytime" id="purgebytime" value="ico">
                    iConomy only
                </label><br>
                <br>   
                <a href="#time" role="button" class="btn btn-warning" data-toggle="modal" id="purgebytime_button">Start &raquo;</a></form>
            </div>
       </div>
      </div>
   <hr>
   
   <!-- Modal -->
<div id="name" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Accept Imputs</h3>
  </div>
  <div class="modal-body">
    <p>
    <div id="output">This text will be changed to something else</div>
        <script>
            function displayName() {
            var $name = $("#sel_name"); 
            var $sel = $("input[name='purgebyname'][type='radio']:checked");
            if($sel.val() == 'all') var sel = "all data";
            if($sel.val() == 'stats') var sel = "all stats";
            if($sel.val() == 'ban') var sel = "all bans";   
            if($sel.val() == 'perms') var sel = "all permissions";
            if($sel.val() == 'shop') var sel = "all Shop data"; 
            if($sel.val() == 'ico') var sel = "all iConomy data"; 
            
            if ($name.val().length == 0){
            $( "#output" ).html( '<strong>Error!</strong> Please enter a player name!');
            $("#start_name").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled');
            } else{
            $("#output" ).html( "Do you really want to delete <b>" + sel + "</b> from player <b>" + $name.val() + "</b>.");
            $("#start_name").removeClass( "btn btn-danger disabled" ).addClass( "btn btn-danger" ).removeAttr('disabled');
            }
            }  
            
            function sendName(){
            var $name = $("#sel_name");
            var $sel = $("input[name='purgebyname'][type='radio']:checked");
            if ($name.val().length != 0){
            $("#start_name").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled').html("Purging...");
            $.post( "./etc/purge.php", { name: $name.val(), data: $sel.val() })
                .done(function( data ) {
                  $("#output" ).html(data);
                  $("#cancel_name" ).html("Close");
                  $("#start_name").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled').html("Start");
            });
            }              
            }
            
            displayName();
            $("#purgebyname_button").click( displayName );
        </script>
  </p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="cancel_name">Cancel</button>
    <button class="btn" name="start_name" id="start_name" disabled="disabled">Start</button>
    <script>$("#start_name").click(sendName);</script>
  </div>
</div>
   
      <!-- Modal -->
<div id="time" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Accept Imputs</h3>
  </div>
  <div class="modal-body">
    <p>
    <div id="output_time">This text will be changed to something else</div>
        <script>
            function displayTime() {
            var $date = $("#date"); 
            var $sel = $("input[name='purgebytime'][type='radio']:checked");
            if($sel.val() == 'all') var sel = "all data";
            if($sel.val() == 'stats') var sel = "all stats";
            if($sel.val() == 'ban') var sel = "all bans";   
            if($sel.val() == 'perms') var sel = "all permissions";
            if($sel.val() == 'shop') var sel = "all Shop data"; 
            if($sel.val() == 'ico') var sel = "all iConomy data"; 
            
            if ($date.val().length == 0){
            $("#output_time" ).html( '<strong>Error!</strong> Please enter a valid Time!');
            $("#start_time").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled');
            } else{
            var inactive_players = get_player_number($date.val());
            if(inactive_players != 0){
            $("#output_time" ).html( "Do you really want to delete <b>" + sel + "</b> from <b>"+ inactive_players +"</b> players which are inactive since <br><b>" + $date.val() + "</b>.");
            $("#start_time").removeClass( "btn btn-danger disabled" ).addClass( "btn btn-danger" ).removeAttr('disabled');           
            }else{
            $("#output_time" ).html("Nothing to purge!");  
            }
            }
            }
            
            function sendTime(){
            var $date = $("#date");
            var $sel = $("input[name='purgebytime'][type='radio']:checked");
            if ($date.val().length != 0){
            $("#start_time").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled').html("Purging...");
            $.post( "./etc/purge.php", { time: $date.val(), data: $sel.val() })
                .done(function( data ) {
                  $("#output_time" ).html(data);
                  $("#cancel_time" ).html("Close");
                  $("#start_time").removeClass( "btn btn-danger" ).addClass( "btn btn-danger disabled" ).attr('disabled', 'disabled').html("Start");
            });
            }              
            }
            
            function get_player_number(time){
                var formData = {time: time, data:'player_number'};
                var result = $.ajax({
                type: "POST",
                url: "./etc/purge.php",
                data: formData,
                async: false, 
                success: function (data) { 
                // nothing needed here 
                }
                }) .responseText ;
                return  result;
            }
            
            displayTime();
            $("#purgebytime_button").click( displayTime );
        </script>
  </p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" id="cancel_time">Cancel</button>
    <button class="btn" name="start_time" id="start_time" disabled="disabled">Start</button>
    <script>$("#start_time").click(sendTime);</script>
  </div>
</div>