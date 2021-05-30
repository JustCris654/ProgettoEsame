<?php
//distrugge la sessione e rimanda alla pagina di login
session_start();
session_destroy();
header('Location: login.html');
?>