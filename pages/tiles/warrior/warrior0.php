<h2>Fighting Skills:</h2>
<h4>Current rank: ---</h4>
<h4>Next rank: <?php echo $config->get_warrior_limits()['NAME_1']?></h4>
<h5>Mob kills:</h5>
<table width="100%">
    <tbody>
        <?php
        $req = $config->get_warrior_limits()['KILLS'];
        $kills = $player->get_kills_id($req);
        foreach($req as $k){
            echo '<tr>';
            echo '<th colspan="2" align="left">Current: '.$kills[$k['id']].' Required: '.$k['number'].'</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<td width ="80%" align="center">';
            echo '<div class="progress progress-striped">';
            echo '<div class="bar" style="width:'. calculate_proz($kills[$k['id']], $k['number']) .'%"></div>';
            echo '</div>';
            echo '</td>';
            echo '<td align="center" valign="top">';
            echo ucfirst($server->get_entity_name($k['id']));
            echo '</td>';
        }
            ?>
    </tbody>
</table>

<p>To achieve a rank from the warrior skill-group, you have to be a very fearsome and mighty person. You can accomplish this rank, by having a certain kill-death proportion. (The kill-death proportion is calculated: (umbers of kills, divided by the number of deaths). The different levels vary by your KD.</p>
<p><form method="POST"><?php draw_button($player,'warrior',0)?>&nbsp;<a class="btn" href="#" id="more_warrior" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=warrior&id=1"><?php echo $config->get_warrior_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=warrior&id=2"><?php echo $config->get_warrior_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=warrior&id=3"><?php echo $config->get_warrior_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>
