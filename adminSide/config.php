<?php // Rememeber to change the username,password and database name to acutal values
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root'); 
if (!defined('DB_PASS')) define('DB_PASS', '1488@@Mihisara');
if (!defined('DB_NAME')) define('DB_NAME', 'gallerycafe_db');


//Create Connection
$link = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Check COnnection
if($link->connect_error){ //if not Connection
die('Connection Failed'.$link->connect_error);//kills the Connection OR terminate execution
}
?>
