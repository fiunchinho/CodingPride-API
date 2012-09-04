<h1>Users</h1>
<ul class="unstyled users">
	<?php foreach($users as $user): ?>
		<li class="user"><a href="<?php echo $base_path?>user/<?php echo $user['username']; ?>"><?php echo $user['username'];
			?> (<?php echo count($user['badges']);?>)</a></li>
	<?php endforeach ?>
</ul>
