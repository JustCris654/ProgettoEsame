<?php
function connect_db($user, $psw, $database): mysqli
{
    $hostname = "127.0.0.1";

    $conn = new mysqli($hostname, $user, $psw, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//    echo "<script>console.log('Connected successfully')</script>";
    return $conn;
}

?>
