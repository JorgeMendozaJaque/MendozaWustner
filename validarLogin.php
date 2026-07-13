<?php

session_start();

require_once "conexionDB.php";

$usuario = trim($_POST["usuario"] ?? "");
$contrasena = trim($_POST["clave"] ?? "");

if ($usuario === "" || $contrasena === "") {
    header("Location: loginpaneladministracion.php?error=CamposVacios");
    exit();
}
$sqlValidar = "SELECT idUsuario FROM usuarios WHERE usuario = ? AND clave = ? LIMIT 1";

$stmtValidar = mysqli_prepare($conexionBd, $sqlValidar);

if (!$stmtValidar) {
    die("Error en prepare: " . mysqli_error($conexionBd));
}

mysqli_stmt_bind_param($stmtValidar, "ss", $usuario, $contrasena);
mysqli_stmt_execute($stmtValidar);
mysqli_stmt_store_result($stmtValidar);

if (mysqli_stmt_num_rows($stmtValidar) === 1) {
    $_SESSION["usuario"] = $usuario;
    $rutaRedireccion = "paneladministracion.php";
} else {
    $rutaRedireccion = "loginpaneladministracion.php?error=datosIncorrectos";
}

mysqli_stmt_close($stmtValidar);
header("Location: " . $rutaRedireccion);
exit();
?>