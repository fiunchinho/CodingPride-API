<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodingPride</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Gamification with commits">
	<meta name="author" content="fiunchinho, natxet">
	<link href="<?php echo $assets_path ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $assets_path ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo $assets_path ?>css/main.css" rel="stylesheet">
</head>

<body>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="<?php echo $base_path ?>">Coding Pride</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="">
						<a href="<?php echo $base_path ?>user">Users</a>
					</li>
					<li class="">
						<a href="<?php echo $base_path ?>badge">Badges</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
<?php echo $contents ?>
</div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="<?php echo $assets_path ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $assets_path ?>js/main.js"></script>
</body>
</html>
