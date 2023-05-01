<!DOCTYPE html>
<html>

<head>
	<?php

	use application\lib\styles;
	use application\lib\Config; ?>
</head>

<body>
	<?php echo styles::genitems($news, true) ?>

	<?php
	styles::setjs('carthandler'); ?>

</body>

</html>