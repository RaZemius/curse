<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Debug;

class MainController extends Controller
{
    function indexAction()
    {
        $auth = null;
        if(array_key_exists('user',$_COOKIE) == true && array_key_exists('token',$_COOKIE)){
            if(($id = $this->model->checkToken($_COOKIE['token'])) != false){
            }
        }
        $news = $this->model->getItems();
        $this->view->render("Главная", ["news" => $news, "auth" => $auth]);
    }
    function searchAction($str){
        if ($str != '')
        {$data = $this->model->selectnews($str);}
        else
        {$data = $this->model->getNews();}
        $this->view->render("поиск", ["data" => $data]);
    }
}