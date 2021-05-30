<?php
require '../../connection_db.php';
if (isset($_REQUEST['provincia'])) {
    $provinciaScelta = $_REQUEST['provincia'];
    $provinciaScelta = addslashes($provinciaScelta);
    $conn = connect_db('root', '', 'db_catena_negozi');

    $sql = "SELECT comuni.nome FROM db_catena_negozi.comuni
              JOIN db_catena_negozi.province ON comuni.id_provincia = province.id
              WHERE province.nome='$provinciaScelta'
              ORDER BY comuni.nome;";


    $result = $conn->query($sql);
    $comuni = "";
    while ($row = $result->fetch_assoc()) {
        $value = urlencode($row['nome']);  //per gestire comuni col nome composto da più parola o con apostrofi
        $comuni .= "<option value='$value'>{$row['nome']}</option>";
    }
    echo $comuni;
}
