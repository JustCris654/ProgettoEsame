<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi");

if (isset($_REQUEST['submit'])) {
    //insert con prepared statement
    $stmt = $conn->prepare("INSERT INTO db_catena_negozi.utenti (nome, cognome, email, password) 
                                VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $psw_hash);    //s = string


    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $psw_hash = password_hash($password, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;
        header("Location: ../app/homepage.php");
    } else {
        echo "Error: ".$stmt->error;

        header("Location: ../generic_error.html");
    }
} else {
    header("Location: register.html");
    exit();
}