<h1>
	User: <?php echo $user['username']?>
</h1>
<?php if(count($user['badges'])): ?>
<ul class="unstyled badges">
	<?php foreach($user['badges'] as $i=>$badge):?>
	<li class="badge <?php echo $badge['name']?>">
		<a class="hide-text" href="<?php echo $base_path?>badge/<?php echo $badge['name']?>"
		   data-original-title="<?php echo $badge['name']?>" data-content="<?php echo $badge['description']?>"
		   rel="popover"><strong><?php echo $badge['name']?></strong></a>
	</li>
	<?php endforeach ?>
</ul>
<?php else: ?>
<div class="alert alert-error">Oh, mean! You deserve nothing!</div>
<?php endif ?>