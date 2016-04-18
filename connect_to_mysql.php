<?php
$username = "mbit_wp1";
$pass = "?*ilpKhdhD^%";
$dsn = 'mysql:host=localhost;dbname=mbit_biovitamini';

try{
    $conn = new PDO($dsn,$username,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo 'ERROR:' .$e->getMessage();
    die();
}


?>