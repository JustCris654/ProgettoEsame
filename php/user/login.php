<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");


if (isset($_REQUEST['submit'])) {
//    echo "1";
    $stmt = null;
    $userType = "";
    if ($_POST['user_type'] == 'user') {
        //select con prepared statement
        $stmt = $conn->prepare("SELECT nome, cognome, password FROM db_catena_negozi_2.Utente where email=?");
        $userType = 'user';
    } elseif ($_POST['user_type'] == 'employee' and $_POST['badge'] != '') {

        //select con prepared statement
        $stmt = $conn->prepare("SELECT nome, cognome, password, ruolo FROM db_catena_negozi_2.Dipendente join db_catena_negozi_2.Ruolo R on R.id = Dipendente.id_ruolo where email=?");
        $userType = 'employee';
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
            if(isset($row['ruolo'])){
                $_SESSION['role'] = $row['ruolo'];
            }
            $_SESSION['user_type'] = $userType;
            $_SESSION['name'] = $row['nome'];
            $_SESSION['surname'] = $row['cognome'];
            $_SESSION['email'] = $email;
            if($userType == 'user') header("Location: /app/homepage.php");
            elseif ($userType=='employee') header('Location: /admin/homepage_admin.php');
            exit();
        }
    }
    header("Location: login.html?msg=error");
    exit();

}
$conn->close();
header("Location: login.html?msg=error");
exit();

