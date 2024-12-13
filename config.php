<?php

const DEVELOP_MODE = true;
const DB_HOST = "127.0.0.1";
const DB_NAME = "webuildDB";
const DB_USER = "root";
const DB_PASSWORD = "";
const EXT = '.php';
const SEP = '/';
const ABS_PATH = __DIR__ . SEP;
const CONTROLLERS_PATH = ABS_PATH . 'controllers' . SEP;
const CORE_PATH = ABS_PATH . 'core' . SEP;
const DB_PATH = ABS_PATH . 'db' . SEP;
const MODELS_PATH = DB_PATH . 'models' . SEP;
const VIEWS_PATH = ABS_PATH . 'views' . SEP;
const PAGES_PATH = VIEWS_PATH . 'pages' . SEP;
function varSuperDump($date)
{
    echo '<pre>';
    var_dump($date);
    echo '</pre>';
}
spl_autoload_register(function ($class) {

    $class = explode('\\', $class)[1];
    $directories = [
        MODELS_PATH,
        CORE_PATH,
        DB_PATH,
        MODELS_PATH,
        CONTROLLERS_PATH
    ];

    foreach ($directories as $directory) {
        if(file_exists($directory . $class . EXT)) {
            require_once($directory . $class . EXT);
            return;
        }
    }
});