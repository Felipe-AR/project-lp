<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['usuario']);

    header("location: index.php");
?>