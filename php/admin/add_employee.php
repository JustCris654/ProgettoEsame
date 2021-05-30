<?php
session_start();
require '../connection_db.php';

//var_dump($_POST);

//prende l'id del comune dati nomi comune, provincia e regione
function getIDComune(mysqli $conn, string $comune, string $provincia, string $regione): int {
    $sql = "select comuni.id from db_catena_negozi.comuni
            join db_catena_negozi.province p on p.id = comuni.id_provincia
            join db_catena_negozi.regioni r on r.id = p.id_regione
            where r.nome = ? and
                  p.nome = ? and
                  comuni.nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $regione, $provincia, $comune);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_row();
        return $row[0];
    } else {
        return -1;
    }
}

//controlla se il negozio, dato l'id, esiste
function checkIDNegozio(mysqli $conn, int $id_negozio): bool {
    $sql = "SELECT * FROM db_catena_negozi.negozi WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_negozio);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows == 1;
}

//trova l'id del ruolo dato il nome
function getIDRuolo(mysqli $conn, string $ruolo): int {
    $sql = "SELECT id FROM db_catena_negozi.ruoli where ruolo=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ruolo);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows == 1 ? $result->fetch_row()[0] : -1;
}

if (isset($_POST['submit']) and $_SESSION['user_type'] == 'employee' and $_SESSION['role'] == 'manager') {
    $conn = connect_db('root', '', 'db_catena_negozi');
    $codice_fiscale = $_POST['codice_fiscale'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = $_POST['password_1'];
    $regione = $_POST['regione'];
    $provincia = $_POST['provincia'];
    $comune = $_POST['comune'];
    $indirizzo = $_POST['indirizzo'];
    $manager = $_POST['manager'];
    $id_negozio = $_POST['negozio'];
    $ruolo = $_POST['ruolo'];
    $stipendio = $_POST['stipendio'];

    $id_comune = getIDComune($conn, $comune, $provincia, $regione);     //ritorna -1 se non trova il comune, l'id corretto altrimenti

    $isIdCorrect = checkIDNegozio($conn, intval($id_negozio));

    $id_ruolo = getIDRuolo($conn, $ruolo);

    if ($isIdCorrect and $id_comune != -1 and $id_ruolo != -1) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = null;
        if ($manager != "") {
            $sql = "INSERT INTO db_catena_negozi.dipendenti(codice_fiscale, nome, cognome, indirizzo, id_comune,
        password, stipendio, manager, id_negozio, id_ruolo, email)
                       VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssisdsiis", $codice_fiscale, $nome, $cognome, $indirizzo, $id_comune, $password,
                $stipendio, $manager, $id_negozio, $id_ruolo, $email);
        } else {
            $sql = "INSERT INTO db_catena_negozi.dipendenti(codice_fiscale, nome, cognome, indirizzo, id_comune,
        password, stipendio, id_negozio, id_ruolo, email)
                       VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssisdiis", $codice_fiscale, $nome, $cognome, $indirizzo, $id_comune, $password,
                $stipendio, $id_negozio, $id_ruolo, $email);
        }
        if ($stmt->execute()) {
            echo "Dipendenti aggiunto con successo";
            echo "<a href='register_employee.php'>Torna alla pagina di registrazione nuovi dipendenti</a>";
        }
    } else {
        echo "<p>Alcuni dati sono sbagliati, ricontrolla</p>";
        echo "<a href='register_employee.php'>Torna alla pagina di registrazione nuovi dipendenti</a>";
    }
    $conn->close();
} else {
    header('Location: register_employee.php');
    exit();
}