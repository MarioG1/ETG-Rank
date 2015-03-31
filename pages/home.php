 <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="well well-large">
        <h1>Welcome </h1>
        <p>Welcome on the ETG Minecraft Account Manager. Here you can manage all your Minecraft/Server account related things like change your rank or set a new password.  </p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
            <div class="thumbnail">
                <h2>Online Players:</h2>
                <p>
                <?php
                    require_once('./incl/minecraftquery/MinecraftQuery.php');
                    require_once('./incl/minecraftquery/MinecraftQueryException.php');

                    use xPaw\MinecraftQuery;
                    use xPaw\MinecraftQueryException;

                    $Query = new MinecraftQuery( );

                    try
                    {
                        $Query->Connect( 'localhost', 25565 );
                        
                        $playerlist = $Query->GetPlayers();
                        $players = $Query->GetInfo()['Players'];
                        $maxplayers = $Query->GetInfo()['MaxPlayers'];
                        
                        for($i=0;$i<$players;$i++)
                        {
                            echo '<img src="';
                            echo get_face($playerlist[$i]);
                            echo '"title="';
                            echo $playerlist[$i];
                            echo '" style="margin:2px;"></img>';
                        } 
                    }
                    catch( MinecraftQueryException $e )
                    {
                      
                    }                
                ?>
                </p>

                <div class="progress progress-striped">
                    <div class="bar" style="width: <?php echo calculate_proz($players,$maxplayers);?>%"></div>
                </div>
                <p><a class="btn" href="http://stats.etg-clan.at/">View details &raquo;</a></p>
            </div>
	</div>

        <div class="span4">
		<div class="thumbnail">
          <h2>New Players</h2>
         <?php
           setlocale(LC_ALL, 'de_DE.utf8');
           for($i=0;$i<5;$i++)
           {
           echo '<p><img src="';
           echo get_face($server->get_new_players_name(5)[$i]);
           echo '"title="';
           echo $server->get_new_players_name(5)[$i];
           echo '"></img>&nbsp;&nbsp;<b>First Seen on:</b>&nbsp;';
           echo date("F j, Y, H:i",$server->get_new_players_firstjoin(5)[$i]);
           echo '</p>';
           }
          ?>
          </br>
          <p><a class="btn" href="http://map.etg-clan.at">View details &raquo;</a></p>
       </div>
	   </div>
	   
        <div class="span4">
		<div class="thumbnail">
          <h2>Recent Ban's</h2>
          <?php
           for($i=0;$i<5;$i++)
           {
           echo '<p><img src="';
           echo get_face($server->get_latest_bans_NAME(5)[$i]);
           echo '"title="';
           echo $server->get_latest_bans_NAME(5)[$i];
           echo '"></img>&nbsp;&nbsp;<b>Banned on:</b>&nbsp;';
           echo date("F j, Y, H:i",$server->get_latest_bans_DATE(5)[$i]);
           echo '</p>';
           }
          ?>
          </br>
          <p><a class="btn" href="http://www.etg-clan.at/Banlist_int.php">View details &raquo;</a></p>
        </div>
		</div>
      </div>

      <hr>