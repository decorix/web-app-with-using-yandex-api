<?php
define('DB_HOST', 'std-mysql');
define('DB_USER', 'std_1957_coursework');
define('DB_PASSWORD', '11111111');
define('DB_NAME', 'std_1957_coursework');
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$mysql){
    echo"Could not connect: ";
}
?>