<h2>Building Skills:</h2>
<h4>Current rank: ---</h4>
<h4>Next rank: <?php echo $config->get_architect_limits()['NAME_1']?></h4>
<p>You are very talented in building huge nice and big structures, or you like building complicated redstone circuits? Then you will like this rank-group a lot. There a three kinds of designers: architects, engineers and geniuses. If you like building houses or cathedrals you can be an architect. If you like building with redstone – then you can be an engineer. And when you building houses and working with redstone, you achieve the genius rank.</p>
<p><form method="POST"><?php draw_button($player,'architect',0)?>&nbsp;<a class="btn" href="#" id="more_architect" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=architect&id=1"><?php echo $config->get_architect_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=architect&id=2"><?php echo $config->get_architect_limits()['NAME_2']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=architect&id=3"><?php echo $config->get_architect_limits()['NAME_3']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>