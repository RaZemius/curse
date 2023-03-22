<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    // public function getNews() {
	// 	$result = $this->db->row('SELECT title, description FROM news');
	// 	return $result;
	// }
	public function getItems(){
		return $this->db->query('select name, value, author.nick, id from items')[0]['result'];
	}
	public function getItem($id)
	{
		return $this->db->query('select name, value, author.nick from items:'.$id)[0]['result'][0];
	}
	public function selectnews($str){
		return $this->db->query('select name, value, author.nick from items where name ?~ "'.$str.'"')[0];
	}
	public function getUser($id){
		return $this->db->query('select nick from users where id = "'.$id.'"')[0]['result'][0];
	}
    
}