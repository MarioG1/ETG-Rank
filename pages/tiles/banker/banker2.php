<h2>Banking Skills:</h2>
<h4>Current rank: <?php echo $config->get_banker_limits()['NAME_2']?></h4>
<h4>Next rank: <?php echo $config->get_banker_limits()['NAME_3']?></h4>
<h5>Money</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_money(), $config->get_banker_limits()['MONEY_3'])?>%"></div>
</div>
<p><b>Current: <?php echo number_format($player->get_money(), 2, ',', '.'); ?>$  Required: <?php echo number_format($config->get_banker_limits()['MONEY_3'], 2, ',', '.'); ?>$</b></p>
<p>You are rich and want that other people can see that you’ve got a lot of money? Then choose the banker-skill. To accomplish this rank you have to have at least a specific amount of money. The different layers vary by your wealth.</p>
<p><form method="POST"><?php draw_button($player,'banker',2)?>&nbsp;<a class="btn" href="#" id="more_banker" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=banker&id=1"><?php echo $config->get_banker_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=banker&id=2"><?php echo $config->get_banker_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=banker&id=3"><?php echo $config->get_banker_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>