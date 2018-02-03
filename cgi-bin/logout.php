<?php
session_start();
unset($_SESSION['isLogged']);
$_SESSION['isLogged'] = false;
header("location: ../index.html#/");
?>