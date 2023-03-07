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
                $auth = $this->model->getUser($id);
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
    function updateAction()
    {
    if (assert($_POST[0])==true) {
    $json = json_decode(array_keys($_POST)[0]);
    
    if (assert($json->search)==true) {
        //var_dump($json);
        $data = $this->model->selectnews($json->search);
        $this->view->render('', ['data' => $data]);
    }
}
    }
}
