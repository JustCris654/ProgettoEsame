<?php
require '../../connection_db.php';
$conn = connect_db('root', '', 'db_catena_negozi');
$sql = "SELECT nome FROM db_catena_negozi.regioni
          ORDER BY nome;";
$result = $conn->query($sql);

$regioni = "";
while ($row = $result->fetch_assoc()) {
    $value = urlencode($row['nome']);
    $regioni .= "<option value='{$value}'>{$row['nome']}</option>";
}
echo $regioni;
