<?php
session_start();
require '../connection_db.php';
$user_auth = "";
if (isset($_SESSION['name']) and isset($_SESSION['surname'])) {
    $user_auth = $_SESSION['name'] . " " . $_SESSION['surname'];
}
if($_SESSION['user_type'] != 'employee'){
    header('Location: /app/homepage.php');
}
$conn = connect_db('root', '', 'db_catena_negozi_2');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Homepage</title>
</head>
<body class="text-center">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
        >


            <ul
                    class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
            >
                <li>
                    <a href="/admin/homepage_admin.php" class="nav-link px-2 text-secondary"
                    >Home</a
                    >
                </li>
                <li>
                    <a href="/admin/add_order.php" class="nav-link px-2 text-secondary"
                    >Aggiungi ordine</a
                    >
                </li>
                <li>
                    <a href="/app/store/store.php" class="nav-link px-2 text-white"
                    >Vedi articoli presenti</a
                    >
                </li>
                <li>
                    <a href="/admin/list_orders.php" class="nav-link px-2 text-white"
                    >Vedi articoli presenti in lista</a
                    >
                </li>

                <li>
                    <a href="/admin/register_employee.php" class="nav-link px-2 text-white"
                    >Registra Dipendente</a
                    >
                </li>
            </ul>

            <?php
            if (isset($_SESSION['name'])) { ?>

                <div class="text-end">
                    <a href="../user/areapersonale.php" style="text-decoration: none">
                        <button type="button" class="btn btn-primary">
                            Area personale <?= $_SESSION['name'] ?> <br>
                        </button>
                    </a>
                </div>


                <?php
            } else { ?>
                <div class="text-end">
                    <a href="/user/login.html" style="text-decoration: none">
                        <button
                                type="button"
                                class="btn btn-outline-primary me-2"
                        >
                            Login
                        </button>
                    </a>
                    <a href="/user/register.html" style="text-decoration: none">
                        <button type="button" class="btn btn-primary">
                            Sign-up
                        </button>
                    </a>
                </div> <?php
            }
            ?>
        </div>
    </div>
</header>

<?php
$sql = "select O.id,
       O.id_negozio,
       O.id_utente,
       U.email,
       A.nome,
       A.nome_marca,
       A.categoria,
       A.prezzo,
       O.garanzia,
       O.data
from db_catena_negozi_2.ordine O
         join db_catena_negozi_2.articolo A on O.nome_pezzo = A.nome
         join db_catena_negozi_2.utente U on O.id_utente = U.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">ID Negozio</th>
        <th scope="col">ID utente</th>
        <th scope="col">Email</th>
        <th scope="col">Nome</th>
        <th scope="col">Marca</th>
        <th scope="col">Categoria</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Garanzia</th>
        <th scope="col">Data</th>
    </tr>
    </thead>
    <tbody>
    <!--    finisci di fare la tabella-->
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <th scope="row"><?= $row['id'] ?></th>
        <td><?= $row['id_negozio'] ?></td>
        <td><?= $row['id_utente'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['nome_marca'] ?></td>
        <td><?= $row['categoria'] ?></td>
        <td><?= $row['prezzo'] ?></td>
        <td><?= $row['garanzia']==1?'Si':'No' ?></td>
        <td><?= $row['data'] ?></td>
    <?php
    }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>
