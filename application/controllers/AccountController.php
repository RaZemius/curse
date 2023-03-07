<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Config;
use application\lib\Debug;

class AccountController extends Controller
{
    function indexAction(){
        $data = $this->model->getuser_prof(1);
        $this->view->render("page of ".$data[1]);
    }
    function loginAction(){
        if (array_key_exists('user',$_COOKIE) == true && array_key_exists('token',$_COOKIE) == true)
        {
            $data = $this->model->checkToken($_COOKIE['token']);
            $this->view->redirect(Config::$appConfig['root_url']);
        }
    else if(array_key_exists('login',$_POST) == true && array_key_exists('pass',$_POST)== true)
        {
            $res = $this->model->check_auth($_POST['login'], $_POST['pass']);
            if ($res != false)
            {
                $res = $this->model->setToken($res);
                setcookie('user', $_POST['login'], 0);
                setcookie('token', $res, time()+60);
                $this->view->redirect(Config::$appConfig['root_url']);
            } else
            {echo 'access denied';}
        }
        else
        {$this->view->render('Вход');}
        
    }
    function RegisterAction()
    {

    }
    function edditAction(){}
    function AcError(){}

}
