<?php // Rememeber to change the username,password and database name to acutal values
define('DB_HOST','localhost');
define('DB_USER','root'); 
define('DB_PASS','1488@@Mihisara');
define('DB_NAME','gallerycafe_db');

//Create Connection
$link = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Check COnnection
if($link->connect_error){ //if not Connection
die('Connection Failed'.$link->connect_error);//kills the Connection OR terminate execution
}
?>
