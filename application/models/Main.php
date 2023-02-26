<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    // public function getNews() {
	// 	$result = $this->db->row('SELECT title, description FROM news');
	// 	return $result;
	// }
	public function getNews(){
		return $this->db->query('select name, value, author.nick from items')[0];
	}
	public function selectnews($str){
		return $this->db->query('select name, value, author.nick from items where name ?~ "'.$str.'"')[0];
	}
    
}