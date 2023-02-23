<!DOCTYPE html>
<html><head>
</head>
<body>
	<link rel="stylesheet" href="application/views/main/style.css">
<header>
<form name="search" action="#" method="get">
	<input type="text" name="q" placeholder="Search"><button type="submit">GO</button>
</form>
<script>
	let target = document.querySelector('input');
	target.addEventListener('keypress',run);
	function httpget(url){
		var req = new XMLHttpRequest();
		req.open("GET", url, false);
		req.send(null);
		return req.responseText;
	}
	function run(){
		let val = '';
		val = '/webalizer/?q='+target.innerHTML+'#';
		console.log(httpget(val));
	}
</script>
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
<div class = items>
<?php  if ($data['status'] == 'OK' && count($data['result']) != 0) {
    foreach($data['result'] as $post):?>
<?php //foreach ($list as $post) : ?>
    <div class ='item'>
        <a><?php echo $post["name"]?></a></br>
        <a><?php echo $post["value"]?></a></br>
		<a>author <?php echo $post["author"]['nick']?></a>
    </div>
<?php //endforeach;
 endforeach;
} else {
	echo('oops nothing founded');
}?>
</div>
</body>
</html>