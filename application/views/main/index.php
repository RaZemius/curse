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
	<div id="wrapper">
		<header></header>
		<nav></nav>
		<div id="heading"></div>
		<aside></aside>
		<section></section>
	</div>
	<footer></footer>
    <div>
    <nav>
	<ul class="top-menu">
		<li><a href="/home/">HOME</a></li>
		<li class="active">ABOUT US</li>
		<li><a href="/services/">SERVICES</a></li>
		<li><a href="/partners/">PARTNERS</a></li>
		<li><a href="/customers/">CUSTOMERS</a></li>
		<li><a href="/projects/">PROJECTS</a></li>
		<li><a href="/careers/">CAREERS</a></li>
		<li><a href="/contact/">CONTACT</a></li>
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