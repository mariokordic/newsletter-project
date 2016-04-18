<?php
/**
 * Created by PhpStorm.
 * User: mkordic
 * Date: 21.10.15.
 * Time: 15:21
 */
include_once 'connect_to_mysql.php';
$sql = "SELECT * FROM newsletter ORDER BY :id DESC";
$rows = $conn->prepare($sql);
$rows->execute(array(":id" => $id));
$dyn_table = '<table border="1" cellpadding="10">';
$dyn_table .='<tr><td>ID</td><td>Ime</td><td>E-mail</td><td>Status</td>';
foreach($rows as $row){
    $id = $row['id'];
    $name= $row['name'];
    $email= $row['email'];
    $received = $row['received'];
    $dyn_table .='<tr><td>'.$id . '</td>';
    $dyn_table .='<td>'.$name . '</td>';
    $dyn_table .='<td>'. $email . '</td>';
    $dyn_table .='<td>'. $received . '</td>';


}
$dyn_table .= '</tr></table>';


?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
     <title>Izlist iz baze!</title>
</head>
    <body>

    <h3>Dinamički lista iz Baze!</h3>
     <a href="/newsletter">Home</a>
    <form action="delete.php" method="POST">

     Obriši id: <input name="t1" type="text" style="width:50px">
     <input type="submit" name="s" value="OK">

     </form>
        <?php echo $dyn_table;?>
    </body>


</html>

