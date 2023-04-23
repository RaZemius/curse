<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Config;
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
    function sudbAction()
    {
        $data = file_get_contents('dbquery.suql');
        if ($data != false) {
            $this->model->run($data);
            $this->view->redirect(Config::$appConfig['root_url']);
        } else {
            echo 'error somewhere in code no return data';
        }
    }
    public function citemAction()
    {
        if (($id = $this->model->Cookiecheck()) != false) {

            if (count($_POST) > 0) {
                $post = $_POST;
                if (assert($post['tags']))
                {$post['tags'] = explode(', ', $post['tags']);}
                $str = 'create items set ';
                $str = $str.json_encode($post);
                /*foreach ($_POST as $key => $val){
                    if (str_contains($val, ','))
                    {
                        $arr = explode(', ', $val);
                        $str = $str.$key.' = '.json_encode($arr).',';
                    }
                    else
                    {$str = $str.$key.'="'.$val.'",';}
                }
                $str = preg_replace('/,.?$/', '', $str);
                */
                
                try{
                    $item = $this->model->create_item('items', $post)[0];
                }
                catch(\Throwable $th) {
                    http_response_code(503);
                    echo 'database error, this item with this name already exist';
                    die();
                }
                if (($file = $this->fileimport($item['id'])) != false) {
                    echo $a = explode(':', $item['id'])[1];
                    //$this->view->redirect(Config::$appConfig['root_url'].'?i=' . $a[1]);
                } else {
                    http_response_code(207);
                    echo 'upload error';
                }

            }
            $this->view->return_req();
        } else {
            http_response_code(401);
        }
    }



    public function fileimport($token)
    {
        $target_dir = Config::$appConfig['path'] . 'public/images/';
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;

            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 5000000) {

            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false; //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $hm = $target_dir . explode(':', $token)[1] . '.' . $imageFileType;
                rename($target_file,$hm);
                return $hm; //echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
            } else {
                echo $target_file;
                echo $target_dir;
                var_dump($_FILES);
                //echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }
}