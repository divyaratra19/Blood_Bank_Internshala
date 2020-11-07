<?php

    session_destroy();
    unset($_SESSION['hospital']);
    session_unset();
    header('Location: h_login.php');


?>