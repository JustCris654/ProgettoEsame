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
    <title>Area personale</title>
</head>
<body>
<?php
if (!isset($_SESSION['email'])) {
    echo "<h1>Prima di accedere all'area personale devi fare il <a href='login.html'>login</a></h1>";
} else {
    echo "caca";
}
?>

</body>
</html>