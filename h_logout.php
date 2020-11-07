<?php
    session_start();
    session_destroy();
    unset($_SESSION['hospital']);
    session_unset();
    header('Location: h_login.php');


?>
