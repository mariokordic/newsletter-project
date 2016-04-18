<?php
/**
 * Created by PhpStorm.
 * User: mkordic
 * Date: 24.09.15.
 * Time: 11:21
 */
header('Content-Type: text/html; charset=utf-8');
require "connect_to_mysql.php";

if(mysql_error()){
    echo "<h2>Greška</h2><em></em>" . mysql_error() . "</em>";
} else {
    echo "<h1>Uspješno ste spojeni na bazu! Happy Coding! </h1>";
}
?>