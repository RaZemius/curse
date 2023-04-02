<!DOCTYPE html>
<html>
	<head>
		<?php use application\lib\styles;
		styles::get('style');
		?>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php echo $content; ?>
	</body>
</html>