<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");

if (isset($_REQUEST['submit'])) {
    //select con prepared statement
    $stmt = $conn->prepare("INSERT INTO Utente (nome, cognome, email, password) 
                                VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $psw_hash);    //s = string


    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $psw_hash = password_hash($password, PASSWORD_DEFAULT);
    echo "<p>nome: $name</p>";
    echo "<p>cognome: $surname</p>";
    echo "<p>email: $email</p>";
    echo "<p>password: $password</p>";

//    $stmt->execute();

    if ($stmt->execute()) {
        $userid = $stmt->insert_id;
        echo "Email: $email, password: $password";
    } else {
        echo "Error: ".$stmt->error;
    }
} else {
    echo "caca";
}

//header("Location: user.html");
//exit();