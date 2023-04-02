<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Config;
use application\lib\Debug;

class MainController extends Controller
{
    function indexAction()
    {
        $id = false;
        $news = $this->model->getItems();
        if(($id = $this->model->Cookiecheck()) != false){
            
        }
        $this->view->render("Главная", ["news" => $news, 'user' => $id]);
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
        $user = $this->model->getUser($data['author']['id']);
        $user['id'] = explode(':', $user['id'])[1];
        $this->view->render($data['name'], ['data' =>$data, 'user'=>$user], 'item');
    }
    function profile_lookAction($id)
    {
        $id = 'users:'.$id;
        $data = $this->model->getUser($id);
        $items = $this->model->getItemsOf($id);
        if ($this->model->Cookiecheck() == $id){
            $this->view->redirect(Config::$appConfig['root_url'].'profile');
        }
        $this->view->render($data['nick'], ['data' => $data, 'items' => $items], 'profileitem');
    }
}