<?php

namespace MyApp;

class Kernel
{
    private static $router = null;
    static function init(){
        self::$router = new Router();
        self::$router->start();
    }
}