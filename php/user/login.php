<?php
session_start();
require '../connection_db.php';
$conn = connect_db("root", "", "db_catena_negozi_2");

//il server in una ipotetica implementazione reale deve controllare
//che il codice inserito sia congruente a un codice creato dal badge
//del dipendente e che cambia ogni t minuti
function checkBadge(): bool {
    return $_POST['badge'] != '';
}

if (isset($_REQUEST['submit'])) {

    $stmt = null;
    $userType = "";
    if ($_POST['user_type'] == 'user') {
        //select con prepared statement per la sicurezza
        $stmt = $conn->prepare("SELECT nome, cognome, password FROM db_catena_negozi_2.utente where email=?");
        $userType = 'user';
    } elseif ($_POST['user_type'] == 'employee' and checkBadge()) {    //controllo se ad accedere e' un dipendente
        //il controllo sul badge e' inutile ma in una ipotetica implementazione reale del progetto
        //i dipendenti avrebbero un badge con un codice identificativo univoco che cambia ogni t minuti
        //e per accedere devono inserirlo, il server che conosce anch'esso il codice controlla che sia giusto
        //se e' giusto procede al login

        //select con prepared statement
        $stmt = $conn->prepare("SELECT nome, cognome, password, ruolo FROM db_catena_negozi_2.dipendente join db_catena_negozi_2.ruolo R on R.id = dipendente.id_ruolo where email=?");
        $userType = 'employee';
    }
    $stmt->bind_param("s", $email);    //s = string

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();

    //se la query e' andata a buon fine il numero di record in output deve essere 1
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $psw_hashed = $row['password'];
        if (password_verify($password, $psw_hashed)) {  //controllo che le credenziali siano giuste
            //imposto le variabili di sessione
            if (isset($row['ruolo'])) {
                $_SESSION['role'] = $row['ruolo'];
            }
            $_SESSION['user_type'] = $userType;
            $_SESSION['name'] = $row['nome'];
            $_SESSION['surname'] = $row['cognome'];
            $_SESSION['email'] = $email;
            if ($userType == 'user') header("Location: /app/homepage.php");      //redirect alla homepage per l'utente
            elseif ($userType == 'employee') header('Location: /admin/homepage_admin.php');   //redirect alla homepage per il dipendente
            exit();
        }
    }
    header("Location: login.html?msg=error");
    exit();

}
$conn->close();
header("Location: login.html?msg=error");   //in caso di errore manda alla pagina di errore generico (da cambiare)
exit();

