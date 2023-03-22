<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Debug;

class MainController extends Controller
{
    function indexAction()
    {
        $news = $this->model->getItems();
        $this->view->render("Главная", ["news" => $news]);
    }
    function searchAction($str){
        if ($str != '')
        {$data = $this->model->selectnews($str);}
        else
        {$data = $this->model->getNews();}
        $this->view->render("поиск", ["data" => $data]);
    }
    function ItemAction($id)
    {
        $data = $this->model->getItem($id);
        $this->view->render($data['name'], ['data' =>$data], 'item');
    }
}