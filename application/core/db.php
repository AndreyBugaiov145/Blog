<?php
require(ROOT.'/application/config/dbConfig.php');
$dbh = new PDO("mysql:host=$host;dbname=$bd;charset=UTF8", "$login", "$password");
return $dbh;
?>