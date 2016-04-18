<?php
if (isset($_GET['e'])) {

    include_once "connect_to_mysql.php";
    // Filter this variable like a mofo for security
    $email = $_GET['e'];

    $sql = "DELETE FROM newsletter WHERE email= :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();

    if (!$stmt) {
        echo "Sorry there seems to be trouble removing your listing. Please email Admin directly using this email address: put an email address here";
    } else {
        echo "It is done. You will not receive our newsletter ever again unless you relist.";
    }
}
?>