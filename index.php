<?php
/**
 * Created by PhpStorm.
 * User: mkordic
 * Date: 20.10.15.
 * Time: 15:43
 */
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>BioVitamini Newsletter Login page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <h1>BioVitamini Newsletter Login page</h1>
    <div id="login">

        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>