<?php
require_once "config.php";

if(DEVELOP_MODE) {
   error_reporting(E_ALL);
} else {
   error_reporting(0);
}

try {
    \MyApp\Kernel::init();
} catch(Exception $e) {

}

