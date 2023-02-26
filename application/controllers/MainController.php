<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Debug;

class MainController extends Controller
{
    function indexAction()
    {
        $news = $this->model->getNews();
        $this->view->render("Главная", ["news" => $news]);
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
        //var_dump($_REQUEST);
if (assert($_POST[0])==true) {
    $json = json_decode(array_keys($_POST)[0]);
    
    if (assert($json->search)==true) {
        var_dump($json);
        $data = $this->model->selectnews($json->search);
        $this->view->render('', ['data' => $data]);
    }
}
    }
}
