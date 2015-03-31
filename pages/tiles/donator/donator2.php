<h2>Sponsor:</h2>
<h4>Current rank: <?php echo $config->get_donator_limits()['NAME_2']?></h4>
<h4>Next rank: --</h4>
<h5>Money</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_donated(), $config->get_donator_limits()['MONEY_2'])?>%"></div>
</div>
<p><b>Current: <?php echo number_format($player->get_donated(), 2, ',', '.'); ?>€  Required: <?php echo number_format($config->get_donator_limits()['MONEY_2'], 2, ',', '.'); ?>€</b></p>
<p>If you want to support our server, so that we can upgrade our server and our internet bandwidth, this rank will be yours! We accept donations via PayPal. Donate at least 5EUR (~7 US-Dollar) to get Donator, and at least 25€ (~35 US-Dollar) to enjoy the permissions of being a VIP.</p>
<p><form method="POST"><?php draw_button($player,'donator',2)?>&nbsp;<a class="btn" href="#" id="more_bonator" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=donator&id=1"><?php echo $config->get_donator_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=donator&id=2"><?php echo $config->get_donator_limits()['NAME_2']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>

<!-- Modal -->
<div id="vip_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">VIP</h3>
    </div>
    <div class="modal-body">
        <p>As an VIP you can create your own rank with an predefined or custom prefix and with your unlocked permissions.</p>
        <h4>Prefix</h4>
        <form method="POST">
            <div class="row-fluid">
                <div class="span6">
                    <label class="radio">
                        <input type="radio" name="prefix_sel" value="predev" checked="checked"  style="margin-top: 8px;">
                            <select name='prefix'>
                            <?php
                                //verfügbare Ränge aus datenbank auslesen und ich textform anzeigen.
                                $ranks = $player->get_ranks();
                                $i = 0;
                                foreach($ranks as $key => $value){
                                    $name = $key;
                                    foreach($value as $lvl => $unlocked){
                                        if($unlocked){
                                            echo "<option>".$config->get_rank_name($name,$lvl)."</option>";
                                        }
                                    }          
                                }
                            ?>
                            </select>
                    </label>
                </div>
                <div class="span6">
                    <label class ="radio">
                        <input type="radio" name="prefix_sel" value="custom" style="margin-top: 8px;" >
                        <div class="control-group error">
                            <input type="text" name="prefix" placeholder="Custom Prefix">
                        </div>
                    </label>
                </div>
            </div>
            <h4>Permissions</h4>
            <div class='row-fluid'>
                <div class='span12'>
                    <label class="checkbox">
                        <input type="checkbox" name="permissions" value="WG">
                        You can protect your houses on the Builder and Visitors map with World Guard.
                    </label>  
                </div>
            </div>
            <div class='row-fluid'>
                <div class='span12'>
                    <label class="checkbox">
                        <input type="checkbox" name="permissions" value="WG">
                        You can create markers on the Online Map.
                    </label>  
                </div>
            </div>
            <div class='row-fluid'>
                <div class='span12'>
                    <label class="checkbox">
                        <input type="checkbox" name="permissions" value="WG">
                        You can hide yourselfe on the Online Map.
                    </label>  
                </div>
            </div>

    </div>
    <div class="modal-footer">   
        <button type="submit" name="donator" class="btn btn-success">Accept</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancle</button>
    </div>
    </form>
</div>