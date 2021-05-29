<?php
session_start();
$user_auth = "";
if (isset($_SESSION['name']) and isset($_SESSION['surname'])) {
    $user_auth = $_SESSION['name'] . " " . $_SESSION['surname'];

}
if ($_SESSION['user_type'] != 'employee') {
    header('Location: /app/homepage.php');
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/loign_register_style.css">
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

<div class="form">
    <form action="add_employee.php" method="POST" name="registerForm" onsubmit="return form_validate()">

        <div class="row g-3">
            <div class="col-12">
                <img class="mb-12 login-img" id="img" src="../svg/user-solid.svg" alt=""/>
            </div>

            <div class="form-floating col-md-6">
                <input type="text"
                       class="form-control"
                       name="name"
                       id="name"
                       placeholder="nome"
                       required>
                <label for="name">Nome</label>
            </div>

            <div class="form-floating col-md-6">
                <input type="text"
                       class="form-control"
                       name="surname"
                       id="surname"
                       placeholder="cognome"
                       required>
                <label for="surname">Cognome</label>
            </div>

            <div class="form-floating col-12">
                <input type="email"
                       class="form-control"
                       name="email"
                       id="email"
                       placeholder="name@example.com"
                       required>
                <label for="email">Email address</label>
            </div>

        </div>


        <div class="form-floating col-12">
            <input type="password"
                   class="form-control"
                   id="password_1"
                   name="password_1"
                   placeholder="password"
                   required>
            <label for="password_1">Password</label>
        </div>

        <div class="form-floating col-12">
            <input type="password"
                   class="form-control"
                   id="password_2"
                   name="password_2"
                   placeholder="password"
                   required>
            <label for="password_2">Reinserisci password</label>
        </div>
        <div class="form-floating col-12">
            <input type="text"
                   class="form-control"
                   id="indirizzo"
                   name="indirizzo"
                   placeholder="Indirizzo"
                   required>
            <label for="password_2">Indirizzo</label>
        </div>

        <label for="regione">Regione: </label>
        <select name="regione" id="regione" class="form-select" onchange="province()">
            <option value="Scegli">Scegli una regione</option>
        </select>

        <label for="provincia">Provincia: </label>
        <select name="provincia" id="provincia" class="form-select" onchange="comuni()">
            <option value="Scegli">Scegli una provincia</option>
        </select>

        <label for="comune">Comune: </label>
        <select name="comune" id="comune" class="form-select">
            <option value="Scegli">Secgli un comune</option>
        </select>

        <div class="form-floating col-md-12">
            <input type="text"
                   class="form-control"
                   name="manager"
                   id="manager"
                   placeholder="Inserisci manager (facoltativo)"
            >
            <label for="surname">Inserisci manager (facoltativo)</label>
        </div>

        <div class="form-floating col-md-12">
            <input type="text"
                   class="form-control"
                   name="negozio"
                   id="negozio"
                   placeholder="Negozio (id)"
                   required>
            <label for="surname">Negozio (id)</label>
        </div>

        <div class="form-floating col-md-12">
            <input type="text"
                   class="form-control"
                   name="ruolo"
                   id="ruolo"
                   placeholder="Ruolo"
                   required>
            <label for="surname">Ruolo</label>
        </div>


        <input type="submit"
               class="w-100 btn btn-lg btn-primary"
               id="submit"
               name="submit"
               value="Registrati">
        <div class="form-text col-12">
            <p class="mt-5 mb-3 text-black-50">Sei già un utente? <a href="login.html">accedi</a></p>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; 2021-today</p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#regione').load('localizzazione/elencoRegioni.php');
    });

    function province() {
        let regioneScelta = $('#regione').val();
        let queryString = 'localizzazione/elencoProvince.php?regione=' + regioneScelta;

        console.log(queryString);

        $('#provincia').load(queryString);

        if (regioneScelta == 'scegli') {
            $('#provincia').attr('disabled', 'true');
            $('#comune').attr('disabled', 'true');
            $('#comune').html("<option value='scegli'>Secgli un comune</option>");
        } else {
            $('#provincia').removeAttr('disabled');
            $('#comune').removeAttr('disabled');
        }
    }

    function comuni() {
        let provinciaScelta = $('#provincia').val();
        let queryString = 'localizzazione/elencoComuni.php?provincia=' + provinciaScelta;

        console.log(queryString);

        $('#comune').load(queryString);

        if (provinciaScelta == 'scegli') $('#comune').attr('disabled', 'true');
        else $('#comune').removeAttr('disabled');
    }
</script>
</body>
</html>
