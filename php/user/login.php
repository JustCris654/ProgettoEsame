<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");

if (isset($_REQUEST['submit'])) {
    //select con prepared statement
    $stmt = $conn->prepare("SELECT nome, cognome, password FROM Utente where email=?");
    $stmt->bind_param("s", $email);    //s = string

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();
//    var_dump($result);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $conn->close();
        $psw_hashed = $row['password'];
//        echo "$psw_hashed";
        if (password_verify($password, $psw_hashed)) {
            $_SESSION['name'] = $row['nome'];
            $_SESSION['surname'] = $row['cognome'];
            $_SESSION['email'] = $email;
            header("Location: ../app/homepage.php");
            exit();
        }
    }
}
header("Location: ../generic_error.html");
exit();

