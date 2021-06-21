<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['nome']);

    header("location: index.php");
?>