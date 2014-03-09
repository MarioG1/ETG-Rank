<h2>Mining Skills:</h2>
<h4>Current rank: <?php echo $config->get_dwarf_limits()['NAME_2']?></h4>
<h4>Next rank: <?php echo $config->get_dwarf_limits()['NAME_3']?></h4>
<h5>Blocks Placed</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_blocks()['placed'], $config->get_dwarf_limits()['PLACED_3']);?>%"></div>
</div>
<p><b>Current: <?php echo''.number_format($player->get_blocks()['placed'], 0, ',', '.').' Required: '.number_format($config->get_dwarf_limits()['PLACED_3'], 0, ',', '.').'</b></p>'; ?>
<h5>Blocks Broken</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_blocks()['broken'], $config->get_dwarf_limits()['BROKEN_3']);?>%"></div>
</div>
<p><b>Current: <?php echo''.number_format($player->get_blocks()['broken'], 0, ',', '.').' Required: '.number_format($config->get_dwarf_limits()['BROKEN_3'], 0, ',', '.').'</b></p>'; ?>
<p>Dig, my friend, DIG! When you like to mine and place blocks, then this is your favorite group. The different levels vary by your block place/break-statistic.</p>
<p><form method="POST"><?php draw_button($player,'dwarf',2)?>&nbsp;<a class="btn" href="#" id="more_dwarf" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=dwarf&id=1"><?php echo $config->get_dwarf_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=dwarf&id=2"><?php echo $config->get_dwarf_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=dwarf&id=3"><?php echo $config->get_dwarf_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>