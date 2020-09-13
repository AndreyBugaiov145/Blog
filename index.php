<?php

ini_set('display_errors' , 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
session_start();
//echo $_SERVER['DOCUMENT_ROOT'];
require_once(ROOT.'/application/core/getURL.php');
require_once(ROOT.'/application/core/pagination.php');
require_once(ROOT.'/application/core/model.php');
require_once(ROOT.'/application/core/view.php');
require_once(ROOT.'/application/core/controller.php');
require_once(ROOT.'/application/core/route.php');


Route::start();
?>