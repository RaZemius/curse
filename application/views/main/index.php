<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php

	use application\lib\Config;
	use application\lib\styles;

	styles::get('style');
	styles::get('items')
	?>

	<div class="top">
		<header>
			<form name="search" action="#" method="get">
				<input type="text" name="q" placeholder="Search"><button type="submit">GO</button>
			</form>
		</header>
		<?php if($user == false)
		{ echo '<button class = reg>регистрация</button>';}
		
		
		
		?>
	</div>
	<div>
		<nav>
			<ul class="top-menu">
				<li><?php styles::setlink('profile', "HOME")?></li>
				<li class="active">ABOUT US</li>

			</ul>
		</nav>
	</div>
	<div class=items>
		<?php foreach ($news as $post) : ?>
			<a class = link href="<?php echo Config::$appConfig['root_url'] . '?i=' . explode('items:', $post['id'])[1] ?>">
				<div class='item'>
					<p><?php echo $post["name"] ?></p>
					<div class=imgcon>
						<?php styles::setimg(explode('items:', $post['id'])[1]); ?>
					</div>
					<p><?php echo $post["value"] ?></p>
					<p>author <?php echo $post["author"]['nick'] ?></p>
				</div>
			</a>
		<?php endforeach; ?>

	</div>
</body>

</html>