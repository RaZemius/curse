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
        if (assert($_COOKIE['user']) && assert($_COOKIE['token']))
        {
            $data = $this->model->check();
            $this->view->redirect(Config::$appConfig['root_url']);
        }
        else if(assert($_POST['login'] && assert($_POST['pass'])))
        {
            $res = $this->model->check_auth($_POST['login'], $_POST['pass']);
            if ($res == true)
            {
                setcookie('user', $_POST['login'], null);
                setcookie('token', $this->model->setToken(), null);
            } else
            {$this->view->render('вход');}
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
