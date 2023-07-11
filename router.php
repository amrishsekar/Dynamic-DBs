<?php

require 'controller/controller.php';

class router
{
    public $routes;
    public $controller;

    public function __construct()
    {
        $this->controller = new UserController();
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }

    public function route()
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $_SERVER['REQUEST_URI'])
            {
                $action = $route['controller'];

                switch ($action)
                {
                    case "main":
                        $this->controller->index();
                        break;
                    case "dbForm":
                        $this->controller->dbForm();
                        break;
                    case "createDb":
                        $this->controller->createDb($_POST);
                        break;
                    case "tableForm":
                        $this->controller->tableForm();
                        break;
                    case "createTable":
                        $this->controller->createTableAndColumn($_POST);
                        break;
                    case "viewTables":
                        $this->controller->viewTables($_POST);
                        break;
                    case "fetchColumns":
                        $this->controller->fetchColumns($_POST);
                        break;
                    case "insertValue":
                        $this->controller->insertValue($_POST);
                        break;
                    default:
                        $this->controller->index();
                }
            }

        }
    }

}