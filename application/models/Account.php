<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

    // public function getNews() {
    // 	$result = $this->db->row('SELECT title, description FROM news');
    // 	return $result;
    // }
    public function getuser_prof($id)
    {
        return $this->db->query('SELECT * from users');
    }
    public function register(){}
    public function eddit(){}
    
}
