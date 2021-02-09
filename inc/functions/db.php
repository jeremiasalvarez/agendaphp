<?php 

define('USER', getenv('DB_USER'));
define('PW', getenv('DB_PW'));
define('DB_NAME', getenv('DB_NAME'));
define('HOST', getenv('DB_HOST'));


$conn = new mysqli(HOST, USER, PW, DB_NAME);


?>