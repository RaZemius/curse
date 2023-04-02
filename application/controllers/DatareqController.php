<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\lib\Config;
use application\lib\Debug;

class DatareqController extends Controller
{
    //this module extends data transmision between js and php for limited access to db entries

    function UpdateAction()
    {
        if (assert($_POST[0]) == true) {
            $json = json_decode(array_keys($_POST)[0]);
            if (assert($json->search) == true) {
                $data = $this->model->get_item($json->search);
                $this->view->render('', ['data' => $data]);
            }
        }
    }
    public function UserAction()
    {
        $id = $this->model->Cookiecheck();
        if ($id != false) {
            $val = $this->model->getuser($id);
            $val = json_encode($val);
            echo $val;
        } else {
            echo "WHO ARE YOU BASTARD";
        }
    }
    public function sudbAction()
    {
        $data = file_get_contents('dbquery.suql');
        if ($data != false) {
            $this->model->run($data);
            $this->view->redirect(Config::$appConfig['root_url']);
        }else {
            echo 'error somewhere in code no return data';
        }
    }
}
