<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");


if (isset($_REQUEST['submit'])) {
//    echo "1";
    $stmt = null;
    if ($_POST['user_type'] == 'user') {
        //select con prepared statement
        $stmt = $conn->prepare("SELECT nome, cognome, password FROM db_catena_negozi_2.Utente where email=?");
    } elseif ($_POST['user_type'] == 'employee' and $_POST['badge'] != '') {

        //select con prepared statement
        $stmt = $conn->prepare("SELECT nome, cognome, password FROM db_catena_negozi_2.Dipendente where email=?");
    }
    $stmt->bind_param("s", $email);    //s = string

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $psw_hashed = $row['password'];
        if (password_verify($password, $psw_hashed)) {
            $_SESSION['user_type'] = $_POST['user_type'];
            $_SESSION['name'] = $row['nome'];
            $_SESSION['surname'] = $row['cognome'];
            $_SESSION['email'] = $email;
            header("Location: ../app/homepage.php");
            exit();
        }
    }
    header("Location: login.html?msg=error");
    exit();

}
$conn->close();
header("Location: login.html?msg=error");
exit();

