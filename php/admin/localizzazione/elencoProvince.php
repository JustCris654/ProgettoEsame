<?php
require '../../connection_db.php';
$conn = connect_db('root', '', 'db_catena_negozi');

if (isset($_REQUEST['regione'])) {
    $conn = connect_db('root', '', 'db_catena_negozi');

    $regioneScelta = $_REQUEST['regione'];
    $regioneScelta = addslashes($regioneScelta);

    $sql = "SELECT p.nome FROM db_catena_negozi.regioni
            JOIN db_catena_negozi.province p on regioni.id = p.id_regione
            WHERE regioni.nome='$regioneScelta'
            ORDER BY p.nome;";
    $result = $conn->query($sql);

    $province = "";
    while ($row = $result->fetch_assoc()) {
        $value = urlencode($row['nome']);
        $province .= "<option value='{$value}'>{$row['nome']}</option>";
    }
    echo $province;
}
