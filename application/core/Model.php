<?php
namespace application\core;


include 'application/lib/vendor/autoload.php';
use application\lib\Config;
use MathisBurger\SurrealDb\SurrealDriver;

abstract class Model
{
    public $db;
    /**
     * @param string $str this func limits character set removing dangerous symbols such as ()"'!-><~=+
     */
    public function del_char($str)
    {
        $str = preg_replace('/[\"\=\+\-><()!#$^&_*\':;\[\]{}\,]/', '', $str);
        return $str;
    }
    /**
     * checks user access via inserted cookies otherwise false
     * can be used staticly
     * @return string|false
     */
    public function Cookiecheck()
    {
        $id = false;
        if (array_key_exists('user', $_COOKIE) == true && array_key_exists('token', $_COOKIE) == true) {
            $id = $this->Check_user(urldecode($_COOKIE['user']));
            $res = $this->checkToken($_COOKIE['token']);
            if ($res == $id) {
                return $res;
            } else {
                return false;
            }
        }
        return false;
    }
    public function check_auth($user, $pass)
    {
        $this->del_char($user);
        $this->del_char($pass);
        $macth = [];
        if (preg_match('/^.*@.*\..*$/', $user, $macth) == 1) {
            $data = $this->db->query('SELECT * from users where email = "' . $user . '" and password ="' . $pass . '"')[0];
        } else {
            $data = $this->db->query('SELECT * from users where nick = "' . $user . '" and password ="' . $pass . '"')[0];
        }
        if (count($data['result']) == 1) {
            return $data['result'][0]['id'];
        } else {
            return false;
        }
    }
    public function checkToken($token)
    {
        $res = $this->db->query('select user from tokens:' . $token)[0]['result'];
        if (array_key_exists(0, $res)) {
            return $res[0]['user'];
        } else {
            return false;
        }
    }

    public function Check_user($id)
    {
        $macth = [];
        $data = false;
        $this->del_char($id);
        try {
            if (preg_match('/^.*@.*\..*$/', $id, $macth) == 1) {
                $data = $this->db->query('select id from users where email ="' . $id . '"')[0]['result'][0]['id'];
            } else {
                $data = $this->db->query('select id from users where id ="' . $id . '"')[0]['result'][0]['id'];
                if (assert($data) && $id == $data) {
                    return $data;
                } else {
                    setcookie('user', null, -1, '/');
                    setcookie('token', null, -1, '/');
                    return false;
                }
            }
        } catch (\Throwable $th) {
            return false;
        }
        return $data;

    }
    public function query($str)
    {
        return $this->db->query($str);
    }
    /**
     * some code simplification maded for supressing php warns
     * takes $data and cheks $key for existans
     * dont think that it will work with multi answer query with 1 result tag
     * @return false|mixed
     */
    public function req_chek($data, $key = 0)
    {
        if (array_key_exists($key, $data[0]['result'])) {
            return $data[0]['result'][$key];
        } else {
            return false;
        }
    }
    public function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 15; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
    function __construct()
    {
        $this->db = null;
        $this->db = new SurrealDriver('ws://127.0.0.1:8000/rpc');
        $this->db->login(Config::$dbConfig['user'], Config::$dbConfig['pass']);
        $this->db->useDatabase(Config::$dbConfig['ns'], Config::$dbConfig['db']);
    }
}