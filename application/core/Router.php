<?php

namespace application\Core;

use application\controllers\MainController;
use application\lib\Config;
use application\core\View;


use application\core\Model;
use application\models\Main;

class Router
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
		$arr = include "application/config/routes.php";
		foreach ($arr as $key => $val) {
			$this->add($key, $val);
		}
	}

	public function add($route, $params) {
	  global $appConfig;
      $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
      $route = '#^'. Config::$appConfig["root_folder"] . $route .'$#';
      $this->routes[$route] = $params;
  }

  public function match() {
      $url = trim($_SERVER['REQUEST_URI'], '/');
      foreach ($this->routes as $route => $params) {
          if (preg_match($route, $url, $matches)) {
              foreach ($matches as $key => $match) {
                  if (is_string($key)) {
                      if (is_numeric($match)) {
                          $match = (int) $match;
                      }
                      $params[$key] = $match;
                  }
              }
              $this->params = $params;
              return true;
          }
      }
      return false;
  }

	public function run()
	{
    if ($this->match()) {
        $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
        if (class_exists($path)) {
            $action = $this->params['action'] . "Action";
            if (method_exists($path, $action)) {
                $controller = new $path($this->params);
                $controller->$action();
            } else {
                //echo 'Не найден такой action: ' . $action;
                View::errorCode(404);
            }
        } else {
            //echo 'Не найден такой контроллер: ' . $path;
            View::errorCode(404);
        }
    } else {
        $res = null;
        if (1 == preg_match('/(\?q=).*?$/', $_SERVER['REQUEST_URI'], $res)) {
            $path = trim($_SERVER['REQUEST_URI'], $res[0]);
            $res = trim($res[0], "?q=");
            $this->routes = ['controller'=>'main','action'=> 'search'];
            $path = 'application\controllers\MainController';
            $class = new $path($this->routes);
            $class->searchAction($res);
        } else
        {View::errorCode(404);}
    }
}
}