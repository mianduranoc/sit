<?php

session_start();

if (isset($_SESSION['usuario'])) {
    unset($_SESSION);
    session_destroy();

}

header("Location:../index.php");

