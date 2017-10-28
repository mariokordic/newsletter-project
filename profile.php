<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Your Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<?

$name = "";
$email = "";
$msg_to_user = "";

if ($_POST['name'] != "" ){

include('connect_to_mysql.php');

$name = $_POST['name'];
$email = $_POST['email'];

$data = $conn->query('SELECT * FROM newsletter WHERE email= ' . $conn->quote($email));
$numRows = $data->rowCount();


if (!$email) {

$msg_to_user = '<br /><br /><h4><font color="FF0000">Please type an email address ' . $name . '.</font></h4>';

} else if ($numRows > 0) {

$msg_to_user = '<br /><br /><h4><font color="FF0000">' . $email . ' is already in the system.</font></h4>';

} else {

$sql_insert = $conn->prepare('INSERT INTO newsletter (name, email, dateTime)
VALUES(:name,:email,NOW())');
$sql_insert->bindParam(':name',$name);
$sql_insert->bindParam(':email',$email);
$sql_insert->execute();

$msg_to_user = '<br /><br /><h4><font color="0066FF">Thanks ' . $name . ', you have been added successfully.</font></h4>';
$name = "";
$email ="";
}
}
?>



<form style="width:440px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset style="text-align:left; padding:24px;">
        <legend>Subscribe new user to Newsletter &nbsp;</legend>
        Name:<br />
        <input name="name" type="text" maxlength="36" value="<?php echo $name; ?>" /><br />
        Email:<br />
        <input name="email" type="text" maxlength="36" value="<?php echo $email; ?>" /><br /><br />
        <input name="mySubmitBtn" type="submit" value="Submit">
        <?php echo $msg_to_user; ?>
    </fieldset>
    <fieldset style="text-align:left;padding:24px;">
        <legend>Pregledavanje baze</legend>
        <a href="select.php"><input id="btn_blast" type="button" value="Pogledaj bazu!"></a>
    </fieldset>
    <fieldset style="text-align:left;padding:24px;">
    <legend>Send Newsletter</legend>
        <a href="blast_script.php"><input id="btn_blast" type="button" value="Send"></a>
    </fieldset>
</form>
</body>
</html>
