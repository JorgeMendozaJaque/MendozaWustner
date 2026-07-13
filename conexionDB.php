<?php

$servidorBd = "localhost";
$usuarioBd = "root";


$passwordBd = "";

$nombreBd = "bdcabanas";

$conexionBd = mysqli_connect($servidorBd, $usuarioBd, $passwordBd, $nombreBd);

if (!$conexionBd) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexionBd, "utf8mb4");
?>