<?php
require 'Product.php';
require "../../connection_db.php";
$conn = connect_db('root', '', 'db_catena_negozi_2');


if (isset($_POST['search']) && $_POST['search'] != "") {
    $cards = array();
    $search_string = $_POST['search'];
    $stmt = $conn->prepare("SELECT * FROM db_catena_negozi_2.articolo WHERE MATCH(nome, nome_marca, descrizione) AGAINST(? in boolean mode)");
    $stmt->bind_param("s", $search_string);
    $search_string .= '*';
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            array_push($cards,
                new Product($data['nome'],
                    $data['descrizione'],
                    $data['categoria'],
                    $data['nome_marca'],
                    $data['prezzo'],
                    $data['immagine']
                ));
        }
        echo json_encode($cards);
    } else {
        echo 'not_found';
    }
} else {
    $cards = array();
    $stmt = $conn->prepare("SELECT * FROM db_catena_negozi_2.articolo");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            array_push($cards,
                new Product($data['nome'],
                    $data['descrizione'],
                    $data['categoria'],
                    $data['nome_marca'],
                    $data['prezzo'],
                    $data['immagine']
                ));
        }
        echo json_encode($cards);

    }
}



