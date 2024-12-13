<?php

namespace MyApp;

class Router
{
    private $controller = null;

    public function start()
    {
        $path = $_SERVER['REQUEST_URI'];
        $path = explode('?', $path)[0];
        $tmpPath = explode('/', $path);

        $defaultControllerName = "MainController";
        $defaultActionName = "index";
        $controllerName = "";
        $actionName = "";
        if (mb_strlen($tmpPath[1]) == 0) {
            $controllerName = $defaultControllerName;
        } else {
            if (file_exists(CONTROLLERS_PATH . ucfirst($tmpPath[1]) . "Controller" . EXT)) {
                $controllerName = ucfirst($tmpPath[1]) . "Controller";
            } else {
                $controllerName = "ErrorController";
            }
        }
        $controllerName = __NAMESPACE__ . '\\' . $controllerName;
        //varSuperDump($controllerName);
        $this->controller = new $controllerName();

        $actionName = $defaultActionName;

        if (!empty($tmpPath[2])) {
            if (method_exists($this->controller, $tmpPath[2])) {
                $actionName = mb_strtolower($tmpPath[2]);
            }
        }
        $this->controller->$actionName();
        //varSuperDump($path);
        //var_dump($this->controller);
    }
}