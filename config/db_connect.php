<?php


#MySQLi or PDO
#establish connection
$dbconn = mysqli_connect('localhost', 'gure', 'pass', 'gure_pizza');

if (!$dbconn) {
    echo `<br> Connection Error` . mysqli_connect_error();
}

?>