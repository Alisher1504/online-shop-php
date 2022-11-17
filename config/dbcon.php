<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_shop';

$con = mysqli_connect($host, $username, $password, $dbname);

if(!$con){
    die("error: ". mysqli_connect_error());
} else {
    echo "connected successfully";
}


?>