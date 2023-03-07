
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
	'/requier_profile'=>[
		'controller'=>'account',
		'action'=>'req_prof'
	],
	'/login'=>[
		'controller'=>'account',
		'action'=>'login'
	],
	'/profile/cart'=>[
		'controller'=>'account',
		'action'=>'cart'
	],
	'/profile/requier_cart'=>[
		'controller'=>'account',
		'action'=>'req_cart'
	]
];
?>
	''=>[
		'controller'=>'',
		'action'=>''
	]