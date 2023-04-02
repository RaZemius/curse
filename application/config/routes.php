
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
	'/login'=>[
		'controller'=>'account',
		'action'=>'login'
	],
	'/profile/cart'=>[
		'controller'=>'account',
		'action'=>'cart'
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
		'action'=>''
	],

	'/data/create/user'=>[
		'controller'=>'datareq',
		'action'=>'newuser'
	],
	
	'/data/update/'=>[
		'controller'=>'',
		'action'=>''
	],
	
	'/data/runquery'=>[
		'controller'=>'datareq',
		'action'=>'sudb'
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