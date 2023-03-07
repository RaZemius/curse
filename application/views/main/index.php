<!DOCTYPE html>
<html><head>
</head>
<body>
	<link rel="stylesheet" href="application/views/main/style.css">
<header>
<form name="search" action="#" method="get">
	<input type="text" name="q" placeholder="Search"><button type="submit">GO</button>
</form>
</header>
<header>
	<a href="/"><img src="" alt="Whitesquare logo"></a>
</header>
    <div>
    <nav>
	<ul class="top-menu">
		<li><a href="/webalizer/profile">HOME</a></li>
		<li class="active">ABOUT US</li>
		
	</ul>
</nav>
</div>
<div class = items>
<?php foreach ($news['result'] as $post) : ?>
    <div class ='item'>
        <a><?php echo $post["name"]?></a></br>
        <a><?php echo $post["value"]?></a></br>
		<a>author <?php echo $post["author"]['nick']?></a>
    </div>
<?php endforeach; ?>

</div>
</body>
</html>