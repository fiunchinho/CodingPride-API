<div class="row">

	<div class="span4">

		<h1>
			<div class="badge <?php echo $badge['name']?>"><a class="hide-text"><?php echo $badge['name']?></a></div>
			<br/>
			<?php echo $badge['name']?>
		</h1>

		<p><?php echo $badge['description']?></p>
	</div>

	<div class="span8">
		<br/>
		<h2>Users that have achieved this badge:</h2>
		<?php if(count($users)): ?>
		<ul class="unstyled users">
			<?php foreach($users as $user): ?>
			<li class="user">
				<a href="<?php echo $base_path?>user/<?php echo $user['username']?>"> <?php echo $user['username']?></a>
			</li>
			<?php endforeach ?>
		</ul>
		<?php else: ?>
		<div class="alert alert-error">No one dares!</div>
		<?php endif ?>

	</div>
</div>