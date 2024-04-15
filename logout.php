<?php

    session_start();
    $_SESSION['auth'] = false;
    header('Location: auth.php');
    die();

?>