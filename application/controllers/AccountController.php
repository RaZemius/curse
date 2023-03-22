<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Config;
use application\lib\Debug;

class AccountController extends Controller
{
    function indexAction(){
        if(($id = $this->model->Cookiecheck()) != false){
            $res =$this->model->get_user($id);
            $arr = $this->model->get_user_items($id);
            if ($res != null){
            $this->view->render('профиль', ['profile' => $res, 'items' => $arr], 'profile');}
            else {
                $this->view->errorCode(404);
            }
        }
        else{
            $this->view->redirect(Config::$appConfig['root_url'].'login');
        }
    }
    function settingsAction(){
        if(($id = $this->model->Cookiecheck())!= false){
            $data = $this->model->get_user($id);
            $this->view->render('настройки', ['data' => $data], 'profile');
        }
        else{
            $this->view->redirect(Config::$appConfig['root_url'].'login');
        }
    }

    public function cartAction()
    {
        if(($id = $this->model->Cookiecheck()) != false){
            $data = $this->model->getcart($id);
            $list = $this->model->getarraydata($data['item']);
            $this->view->render('корзина', ['cart' => $data, 'items' => $list], 'profile');
        } else{
            $this->view->redirect(Config::$appConfig['root_url'].'login');
        }
    }
    public function chatsAction()
    {
        if(($id = $this->model->Cookiecheck()) != false){
            $data =
            $this->view->render('чаты', [], 'profile');
        }else{
            $this->view->redirect(Config::$appConfig['root_url'] . 'login');
        }
    }




    function loginAction(){
        if ($this->model->Cookiecheck() != false){
            $this->view->redirect(Config::$appConfig['root_url']);
        }
        else if(array_key_exists('login',$_POST) == true && array_key_exists('pass',$_POST)== true)
        {
            $res = $this->model->check_auth($_POST['login'], $_POST['pass']);
            if ($res != false)
            {
                $res = $this->model->setToken($res);
                setcookie('user', $_POST['login'], 0,'/');
                setcookie('token', $res, time()+3600, '/');
                $this->view->redirect(Config::$appConfig['root_url']);
            } else
            {echo 'access denied';}
        }
        else
        {$this->view->render('Вход');}
        
    }
}
