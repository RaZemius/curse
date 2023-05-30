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
		<a href="<?php echo Config::$appConfig['root_url'] ?>"><button>на главную</button></a>
			<form name="search" action="#" method="get" class=toptext>
				<input type="text" name="q" placeholder="Search" class=toptext><button class=toptext type="submit">найти</button>
			</form>
			<?php if ($user == false) {
				styles::setlink('login', '<button class = toptext>регистрация</button>');
			} else {
				styles::setlink('profile', "<button class = toptext>профиль</button>");
			}



			?>
			<button id = cart-buy>купиииить</button>
	</div>
	<div class=main>
		<?php echo $content; ?>
	</div>
</body>

</html>