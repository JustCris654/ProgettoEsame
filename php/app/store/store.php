<?php
session_start();
require 'Product.php';
$user_auth = "";
if (isset($_SESSION['name']) and isset($_SESSION['surname'])) {
    $user_auth = $_SESSION['name'] . " " . $_SESSION['surname'];
}
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
    <link rel="stylesheet" href="../../style/store.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Hardwareinyou | Store 😎</title>
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
                    <a href="#" class="nav-link px-2 text-secondary"
                    >Home</a
                    >
                </li>
                <li>
                    <a href="#" class="nav-link px-2 text-white"
                    >Store</a
                    >
                </li>
                <li>
                    <a href="#" class="nav-link px-2 text-white"
                    >Vieni a trovarci</a
                    >
                </li>

                <li>
                    <a href="#" class="nav-link px-2 text-white"
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

<!-- eseguire una ricerca con ajax -->
<div class="bg-light form-control">
    <label for="search">Cerca:</label>
    <input type="text" class="form-control" name="search" id="search" onkeyup="search_articles(this.value)">
</div>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="articles-container">

            <!--            cards              -->
            <?php
            $cards = array();
            for ($i = 0; $i < 2; $i++) {
                array_push($cards,
                    new Product("RTX 207$i", 'manto', 'Schede Video', 'NVIDIA', 400.0 + $i));
            }

            foreach ($cards as $card) {
                echo $card->getCard();
            }

            ?>
        </div>
    </div>
</div>

<script src="app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>