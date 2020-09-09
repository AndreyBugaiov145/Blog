<?php

ini_set('display_errors' , 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/application/core/model.php');
require_once(ROOT.'/application/core/view.php');
require_once(ROOT.'/application/core/controller.php');
require_once(ROOT.'/application/core/route.php');


Route::start();
?>