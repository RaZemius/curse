<!DOCTYPE html>
<html>

<head>
	<?php use application\lib\styles;
	use application\lib\Config;?>
</head>

<body>
	<div class=items>
		<?php foreach ($news as $post) : ?>
			<a class=link href="<?php echo Config::$appConfig['root_url'] . '?i=' . explode('items:', $post['id'])[1] ?>">
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