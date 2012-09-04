<h1>Badges</h1>
<ul class="unstyled badges">
	<?php foreach($badges as $i => $badge ): ?>
	<li class="badge <?php echo $badge['name']?>">
		<a class="hide-text" href="<?php echo $base_path?>badge/<?php echo $badge['name']?>"
		   data-original-title="<?php echo $badge['name']?>" data-content="<?php echo $badge['description']?>"
		   rel="popover"><strong><?php echo $badge['name']?></strong></a>
	</li>
	<?php endforeach ?>
</ul>