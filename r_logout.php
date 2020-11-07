<?php

    session_destroy();
    unset($_SESSION['receiver']);
    session_unset();
    header('Location: r_login.php');
?>