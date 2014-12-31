<h2>Sponsor:</h2>
<h4>Current rank: <?php echo $config->get_donator_limits()['NAME_1']?></h4>
<h4>Next rank: <?php echo $config->get_donator_limits()['NAME_2']?></h4>
<h5>Money</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_donated(), $config->get_donator_limits()['MONEY_2'])?>%"></div>
</div>
<p><b>Current: <?php echo number_format($player->get_donated(), 2, ',', '.'); ?>€  Required: <?php echo number_format($config->get_donator_limits()['MONEY_2'], 2, ',', '.'); ?>€</b></p>
<p>If you want to support our server, so that we can upgrade our server and our internet bandwidth, this rank will be yours! We accept donations via PayPal. Donate at least 5EUR (~7 US-Dollar) to get Donator, and at least 25€ (~35 US-Dollar) to enjoy the permissions of being a VIP.</p>
<p><?php draw_button($player,'donator',1)?>&nbsp;<a class="btn" href="#" id="more_bonator" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=donator&id=1"><?php echo $config->get_donator_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=donator&id=2"><?php echo $config->get_donator_limits()['NAME_2']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></p>

<!-- Modal -->
<div id="donator_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Donator</h3>
  </div>
  <div class="modal-body">
    <p>As an Donator you can use the <font color="#0000AA">[</font><font color="#FFAA00"><?php echo $config->get_donator_limits()['NAME_1'];?></font><font color="#0000AA">]</font> prefix with the permissions of one of your unlocked ranks.</p>
       <h3>Aviable Ranks:</h3>
       <form method="POST">
           <table width="100%">
            <?php
            //verfügbare Ränge aus datenbank auslesen und ich textform anzeigen.
            $ranks = $player->get_ranks();
            $i = 0;
            foreach($ranks as $key => $value){
                $name = $key;
                foreach($value as $lvl => $unlocked){
                    if($unlocked && $name != 'donator'){
                        if($i==0){
                            echo "<tr>";
                        }
                        echo"<td><label class='radio'><input type='radio' name='do_ranks' value='".$name."_".$lvl."'>". $config->get_rank_name($name,$lvl)."</label></td>";
                        if($i==2){
                            echo "</tr>";
                            $i = 0;
                        }
                        $i++;
                    }
                }          
            }
            ?>
           </table>
    </div>
  <div class="modal-footer">   
        <button type="submit" name="donator" class="btn btn-success">Accept</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancle</button>
  </div>
    </form>
</div>