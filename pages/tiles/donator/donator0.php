<h2>Sponsor:</h2>
<div class="alert alert-error">
    The Sponsor rank is not aviable at the moment due to of the <a href="https://mojang.com/2014/06/lets-talk-server-monetisation-the-follow-up-qa/">EULA</a> changes.
</div>
<h4>Current rank: ---</h4>
<h4>Next rank: <?php echo $config->get_donator_limits()['NAME_1']?></h4>
<h5>Money</h5>
<div class="progress progress-striped">
    <div class="bar" style="width: <?php echo calculate_proz($player->get_donated(), $config->get_donator_limits()['MONEY_1'])?>%"></div>
</div>
<p><b>Current: <?php echo number_format($player->get_donated(), 2, ',', '.'); ?>€  Required: <?php echo number_format($config->get_donator_limits()['MONEY_1'], 2, ',', '.'); ?>€</b></p>
<p>If you want to support our server, so that we can upgrade our server and our internet bandwidth, this rank will be yours! We accept donations via PayPal. Donate at least 5EUR (~7 US-Dollar) to get Donator, and at least 25€ (~35 US-Dollar) to enjoy the permissions of being a VIP.</p>
<p><form method="POST"><?php draw_button($player,'donator',0)?>&nbsp;<a class="btn" href="#" id="more_bonator" data-trigger="hover" data-placement="top" data-html="true" data-content='<a class="btn" href="?page=donator&id=1"><?php echo $config->get_donator_limits()['NAME_1']?> &raquo;</a>&nbsp;&nbsp;<a class="btn" href="?page=donator&id=2"><?php echo $config->get_donator_limits()['NAME_2']?> &raquo;</a>' title="" data-original-title="Select Rank">View details &raquo;</a></from></p>