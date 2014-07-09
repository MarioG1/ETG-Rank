<h2>Traveling Skills:</h2>
<h4>Current rank: ---</h4>
<h4>Next rank: <?php echo $config->get_voyager_limits()['NAME_1']?></h4>
<h5>Distance Traveled</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_distance()['total'], $config->get_voyager_limits()['TOTAL_1']);?>%"></div>
</div>
<p><b>Current: <?php echo''.number_format($player->get_distance()['total'], 0, ',', '.').' Required: '.number_format($config->get_voyager_limits()['TOTAL_1'], 0, ',', '.').'</b></p>'; ?>
<p>You like to travel through biomes? Like to explore the infinite world of our minecraft server? Then this class is perfect for you. The different levels vary by the distance you traveled and walked.</p>
<p><form method="POST"><?php draw_button($player,'voyager',0)?>&nbsp;<a class="btn" href="#" id="more_voyager" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=voyager&id=1"><?php echo $config->get_voyager_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=voyager&id=2"><?php echo $config->get_voyager_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=voyager&id=3"><?php echo $config->get_voyager_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>