<!DOCTYPE html>
<html>

<head>
	<?php

	use application\lib\Config;
	use application\lib\styles;

	styles::get('style');
	styles::get('top');
	styles::get('items');
	?>
	<title><?php echo $title; ?></title>
</head>

<body>

	<div class="top">
		<a href="<?php echo Config::$appConfig['root_url'] ?>"><button>main page</button></a>
			<form name="search" action="#" method="get" class=toptext>
				<input type="text" name="q" placeholder="Search" class=toptext><button class=toptext type="submit">GO</button>
			</form>
			<?php if ($user == false) {
				styles::setlink('login', '<button class = toptext>registration</button>');
			} else {
				styles::setlink('profile', "<button class = toptext>HOME</button>");
			}



			?>
			<button id = cart-buy>buy all</button>
	</div>
	<div class=main>
		<?php echo $content; ?>
	</div>
</body>

</html>