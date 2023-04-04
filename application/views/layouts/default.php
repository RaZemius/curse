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
		<header>
			<form name="search" action="#" method="get">
				<input type="text" name="q" placeholder="Search"><button type="submit">GO</button>
			</form>
		</header>
		<?php if ($user == false) {
			styles::setlink('login', '<button>registration</button>');
		} else{
			styles::setlink('profile', "<button>HOME</button>");
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