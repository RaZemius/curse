
<?php
return [

	'' => [
		'controller' => 'main',
		'action' => 'index'
	],
	
	'/search'=>[
		'controller'=>'main',
		'action'=>'update'
	],
	'/profile' => [
		'controller' => 'account',
		'action' => 'index'
	],
	'/profile/login'=>[
		'controller'=>'account',
		'action'=>'login'
	],
	'/posts' => [
		'controller' => 'posts',
		'action' => 'index'
	],
	'/posts/create-new' => [
		'controller' => 'posts',
		'action' => 'new'
	],
	'/profile/eddit' => [
		'controller' => 'account',
		'action' => 'eddit'
	]
];
?>
	''=>[
		'controller'=>'',
		'action'=>''
	]