
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
	
	'/profile/exit'=>[
		'controller'=>'account',
		'action'=>'exit'
	],

	'/profile/create' => [
		'controller' => 'account',
		'action' => 'create'
	],
	'/profile' => [
		'controller' => 'account',
		'action' => 'index'
	],
	'/profile/settings'=>[
		'controller'=>'account',
		'action'=>'settings'
	],
	'/login'=>[
		'controller'=>'account',
		'action'=>'login'
	],
	'/profile/cart'=>[
		'controller'=>'account',
		'action'=>'cart'
	],
	'/profile/story' => [
		'controller' => 'account',
		'action' => 'cart'
	],
	'/profile/chats' => [
		'controller' => 'account',
		'action' => 'chats'
	],



	'/data/req/'=>[
		'controller'=>'account',
		'action'=>'req_cart'
	],
	'/data/req/item_img'=>[
		'controller'=>'datareq',
		'action'=>'get_itemImage'
	],
	'/data/create/item'=>[
		'controller'=>'datareq',
		'action'=>'citem'
	],
	'/data/create/vote' => [
		'controller' => 'datareq',
		'action' => 'vote'
	],
	'/data/create/cart'=>[
		'controller'=>'datareq',
		'action'=>'cart'
	],
	
	'/data/create/user'=>[
		'controller'=>'datareq',
		'action'=>'newuser'
	],

	
	'/data/update/'=>[
		'controller'=>'',
		'action'=>''
	],

	'/data/update/vote' => [
		'controller' => 'datareq',
		'action' => 'votes'
	],
	
	'/data/runquery'=>[
		'controller'=>'datareq',
		'action'=>'sudb'
	]
	
];
?>
	''=>[
		'controller'=>'',
		'action'=>''
	]