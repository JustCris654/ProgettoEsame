<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");

if (isset($_REQUEST['submit'])) {
    //insert con prepared statement
    $stmt = $conn->prepare("INSERT INTO db_catena_negozi_2.utente (nome, cognome, email, password) 
                                VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $psw_hash);    //s = string


    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $psw_hash = password_hash($password, PASSWORD_DEFAULT);
//    echo "<p>nome: $name</p>";
//    echo "<p>cognome: $surname</p>";
//    echo "<p>email: $email</p>";
//    echo "<p>password: $password</p>";

//    $stmt->execute();

    if ($stmt->execute()) {
//        echo "Email: $email, password: $password";
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