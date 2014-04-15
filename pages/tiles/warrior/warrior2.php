<h2>Fighting Skills:</h2>
<h4>Current rank: <?php echo $config->get_warrior_limits()['NAME_2']?></h4>
<h4>Next rank: <?php echo $config->get_warrior_limits()['NAME_3']?></h4>
<h5>Kills</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_kills()['pvp'], $config->get_warrior_limits()['KILLS_3'])?>%"></div>
</div>
<p><b>Current: <?php echo $player->get_kills()['pvp']; ?> Required: <?php echo $config->get_warrior_limits()['KILLS_3']; ?></b></p>
<h5>Unique Kills</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_ukills()['pvp'], $config->get_warrior_limits()['UKILLS_3'])?>%"></div>
</div>
<p><b>Current: <?php echo $player->get_ukills()['pvp']; ?> Required: <?php echo $config->get_warrior_limits()['UKILLS_3']; ?></b></p>
<h5>K/D</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz(calculate_kd($player->get_kills()['pvp'], $player->get_deaths()['pvp']+$player->get_deaths()['pve']), $config->get_warrior_limits()['KD_3'])?>%"></div>
</div>
<p><b>Current: <?php echo calculate_kd($player->get_kills()['pvp'], $player->get_deaths()['pvp']); ?> Required: <?php echo $config->get_warrior_limits()['KD_3']; ?></b></p>
<p>To achieve a rank from the warrior skill-group, you have to be a very fearsome and mighty person. You can accomplish this rank, by having a certain kill-death proportion. (The kill-death proportion is calculated: (umbers of kills, divided by the number of deaths). The different levels vary by your KD.</p>
<p><form method="POST"><?php draw_button($player,'warrior',2)?>&nbsp;<a class="btn" href="#" id="more_warrior" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=warrior&id=1"><?php echo $config->get_warrior_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=warrior&id=2"><?php echo $config->get_warrior_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=warrior&id=3"><?php echo $config->get_warrior_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>