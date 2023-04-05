<!DOCTYPE html>
<html>

<head>
	<?php

	use application\lib\styles;

	styles::get('style');
	styles::get('top');
	styles::get('items');
	?>
	<title><?php echo $title; ?></title>
</head>

<body>

	<div class="top">
			<form name="search" action="#" method="get" class = toptext>
				<input type="text" name="q" placeholder="Search" class = toptext><button class = toptext type="submit">GO</button>
			</form>
		<?php if ($user == false) {
			styles::setlink('login', '<button class = toptext>registration</button>');
		} else{
			styles::setlink('profile', "<button class = toptext>HOME</button>");
		}



		?>
		<div class="top-menu">
			<li class="active">ABOUT US</li>

		</div>
	</div>
	<div class = main>
		<?php echo $content; ?>
	</div>
</body>

</html>