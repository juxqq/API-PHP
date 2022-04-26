<?php

include('db_connect.php');
global $conn;

$query = 'UPDATE `users` SET `Confirmed`=1 WHERE MailAdress="'.$_GET['mail'] . '"';
if(mysqli_query($conn, $query)) {
    echo 'Votre compte est désormais confirmer.';
}
else {
    echo 'ERREUR';
}
?>