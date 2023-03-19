
<?php
return [

	'' => [
		'controller' => 'main',
		'action' => 'index'
	],
	'/search'=>[
		'controller'=>'datareq',
		'action'=>'update'
	],
	'/profile' => [
		'controller' => 'account',
		'action' => 'index'
	],
	'/profile/bucket'=>[
		'controller'=>'account',
		'action'=>'bucket'
	],
	'/profile/settings'=>[
		'controller'=>'account',
		'action'=>'settings'
	],
	'/data/requier_profile'=>[
		'controller'=>'datareq',
		'action'=>'user'
	],
	'/login'=>[
		'controller'=>'account',
		'action'=>'login'
	],
	'/profile/cart'=>[
		'controller'=>'account',
		'action'=>'cart'
	],
	'/data/requier_cart'=>[
		'controller'=>'account',
		'action'=>'req_cart'
	],
	'/data/requier_items'=>[
		'controller'=>'datareq',
		'action'=>'get_items'
	],

	'/profile/story' => [
		'controller' => 'account',
		'action' => 'cart'
	],
	'/profile/chats' => [
		'controller' => 'account',
		'action' => 'chats'
	]
];
?>
	''=>[
		'controller'=>'',
		'action'=>''
	]