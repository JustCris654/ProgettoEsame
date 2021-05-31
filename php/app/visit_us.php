<?php
session_start();
require '../connection_db.php';
$conn = connect_db('root', '', 'db_catena_negozi');
?>
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
                    <a href="/app/homepage.php" class="nav-link px-2 text-secondary"
                    >Home</a
                    >
                </li>
                <li>
                    <a href="/app/store/store.php" class="nav-link px-2 text-white"
                    >Store</a
                    >
                </li>
                <li>
                    <a href="/app/visit_us.php" class="nav-link px-2 text-white"
                    >Vieni a trovarci</a
                    >
                </li>

                <li>
                    <a href="/app/about_us.php" class="nav-link px-2 text-white"
                    >About</a
                    >
                </li>
            </ul>

            <?php
            if (isset($_SESSION['name'])) { ?>

                <div class="text-end">
                    <a href="/user/areapersonale.php" style="text-decoration: none">
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
<p style="margin-top: 80px">
    Vieni a trovarci in negozio, potrai provare i nostri prodotti e parlare con il nostro staff.
</p>

<p>
    Ci troverai:
</p>
<?php
$sql = "SELECT n.indirizzo, c.nome FROM db_catena_negozi.negozi n
join db_catena_negozi.comuni c on c.id = n.id_comune";
$result = $conn->query($sql);

if($result->num_rows>0){
    while($row = $result->fetch_row()){
        ?>
        <p>
            * <?= $row[0]." ".$row[1] ?>
        </p>
<?php
    }
}

?>
</body>
</html>