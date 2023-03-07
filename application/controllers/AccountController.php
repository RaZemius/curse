<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Config;
use application\lib\Debug;

class AccountController extends Controller
{
    public function Cookiecheck(){
        $id = false;
        if (array_key_exists('user',$_COOKIE) == true && array_key_exists('token',$_COOKIE) == true)
        {
            $id = $this->model->Check_user(urldecode($_COOKIE['user']));
            $id = $this->model->checkToken($_COOKIE['token']);
        }
        return $id;
    }
    function indexAction(){
        if(($id = $this->Cookiecheck()) != false){
            $res =$this->model->get_user($id);
            $this->view->render('профиль', ['profile' => $res]);
        }
        else{
            $this->view->redirect(Config::$appConfig['root_url'].'login');
        }
    }
    function loginAction(){
        if ($this->Cookiecheck() != false){
            $this->view->redirect(Config::$appConfig['root_url']);
        }
        else if(array_key_exists('login',$_POST) == true && array_key_exists('pass',$_POST)== true)
        {
            $res = $this->model->check_auth($_POST['login'], $_POST['pass']);
            if ($res != false)
            {
                $res = $this->model->setToken($res);
                setcookie('user', $_POST['login'], 0,'/');
                setcookie('token', $res, time()+60, '/');
                $this->view->redirect(Config::$appConfig['root_url']);
            } else
            {echo 'access denied';}
        }
        else
        {$this->view->render('Вход');}
        
    }
    function ProfileAction(){

    }
}
