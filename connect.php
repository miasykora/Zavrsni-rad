<?php

define("RELATIVE_PATH","zavrsni");
define("DOCUMENT_ROOT",$_SERVER['DOCUMENT_ROOT']."/".RELATIVE_PATH);
define("ABSOLUTE_PATH","/".RELATIVE_PATH);
define('UPLPATH', 'slike/');

define("SERVER_NAME","localhost");
define("DB_USER","root");
define("DB_PASS", "3884");
define("DB_NAME","putovanja");

$dbc = mysqli_connect(SERVER_NAME, DB_USER, DB_PASS, DB_NAME) or die('Error connecting to MySQL server.'.mysqli_error($dbc));
mysqli_set_charset($dbc, "utf8");

if ($dbc) {
    //echo "Connected successfully"; // za testiranje
}