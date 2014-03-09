<!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Ban History</h1>
        <p>Below you see a List of all your ban's</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div style="margin-left: 30px;">
		<div class="thumbnail">
        <table class="table table-striped">
           <tr>
                 <td><span style="font-weight:bold; font-size:1.8em">#</span></td>
                 <td><span style="font-weight:bold; font-size:1.8em">Banned by</span></td>
                 <td><span style="font-weight:bold; font-size:1.8em">Reason</span></td>
                 <td><span style="font-weight:bold; font-size:1.8em">Expires at</span></td>
                 <td><span style="font-weight:bold; font-size:1.8em">Date</span></td>
                 <td><span style="font-weight:bold; font-size:1.8em">Active</span></td>
           </tr>
           <?php
           if($player->get_bans() != NULL)
           {
                 $i=0;
                 foreach($player->get_bans() as $k)
                 {
                   echo"<tr>";
                   echo'<td>'.$i++.'</td>';
                   echo'<td>';
                   echo $server->get_ban_name($k['creator_id']);
                   echo'</td><td>';
                   echo $k['reason'];
                   echo'</td><td>';
                   if($k['expires_at'] != NULL) echo date("F j, Y, g:i a",strtotime($k['expires_at']));
                   else echo "Perm. Ban";
                   echo'</td><td>';
                   echo date("F j, Y, g:i a",strtotime($k['created_at']));
                   echo'</td><td>';
                   if($k['state'] != 0){ echo '<img src="./images/no.png" width="32" height="32" title="No"></img>';} else echo '<img src="./images/yes.png" width="32" height="32" title="Yes"></img>';
                   echo'</td>';
                   echo"</tr>";
                  }
           }
           else
           {
             echo '<tr>';
             echo '<td colspan="6">';
             echo '    <div class="alert">';
             echo '         <button type="button" class="close" data-dismiss="alert">&times;</button>';
             echo '         <strong>Warning!</strong> No data to display!';
             echo '    </div>';
             echo '</td></tr>';
           }
            ?>
         </table>
         <p><a href="http://forum.etg-clan.at/viewforum.php?f=10&sid=2568e90db52c2fdc8a5be2681013a4f8" class="btn btn-primary btn-large">UnBan Appeal &raquo;</a></p>
        </div>
		</div>
      </div>
  <hr>