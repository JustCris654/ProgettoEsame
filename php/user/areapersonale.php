<?php
session_start();
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
    <title>Area personale</title>
</head>
<body>
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
<?php
if (!isset($_SESSION['email'])) {
    echo "Prima di entrare nell'area personale devi loggarti";
} else {
    ?>
    <h1>Area personale<?= $_SESSION['user_type'] == 'employee' ? ' dipendente' : ' utente' ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo utente</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row"><?= $_SESSION['name'] ?></td>
            <td><?= $_SESSION['surname'] ?></td>
            <td><?= $_SESSION['email'] ?></td>
            <td><?= $_SESSION['user_type'] == 'employee' ? ' Dipendente' : ' Utente' ?></td>

        </tr>
        </tbody>

    </table>
    <a href="logout.php">Logout</a>
    <?php
}
?>

</body>
</html>
