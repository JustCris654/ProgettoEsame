<?php
require 'Product.php';
require "../../connection_db.php";
$conn = connect_db('root', '', 'db_catena_negozi');
//var_dump($_POST);

if (isset($_POST['search']) && $_POST['search'] != "") {
    $cards = array();
    $sql = "SELECT * FROM db_catena_negozi.articoli WHERE MATCH(nome, descrizione) AGAINST(? in boolean mode)";
    $stmt = $conn->prepare($sql);
    $search_string = $_POST['search'];
    $search_string .= '*';
    $stmt->bind_param("s", $search_string);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            $nome = $data['nome'];
            $sql = "SELECT m.nome as marca, c.nome as categoria FROM db_catena_negozi.articoli
                    join db_catena_negozi.categorie c on c.id = articoli.id_categoria
                    join db_catena_negozi.marche m on articoli.id_marca = m.id
                    WHERE articoli.nome = '$nome'";
            $result_2 = $conn->query($sql);
            $categoria = "";
            $marca = "";
            if ($result_2->num_rows == 1) {
                $row = $result_2->fetch_assoc();
                $categoria = $row['categoria'];
                $marca = $row['marca'];
            }

            array_push($cards,
                new Product($nome,
                    $data['descrizione'],
                    $categoria,
                    $marca,
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
    $sql = "SELECT * FROM db_catena_negozi.articoli";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            $nome = $data['nome'];
            $sql_2 = "SELECT m.nome as marca, c.nome as categoria FROM db_catena_negozi.articoli
                    join db_catena_negozi.categorie c on c.id = articoli.id_categoria
                    join db_catena_negozi.marche m on articoli.id_marca = m.id
                    WHERE articoli.nome = '$nome'";
            $result_2 = $conn->query($sql_2);
            $categoria = "";
            $marca = "";
            if ($result_2->num_rows > 0) {
                $row = $result_2->fetch_assoc();
                $categoria = $row['categoria'];
                $marca = $row['marca'];
            }

            array_push($cards,
                new Product($nome,
                    $data['descrizione'],
                    $categoria,
                    $marca,
                    $data['prezzo'],
                    $data['immagine']
                ));
        }


    }
    echo json_encode($cards);
}



