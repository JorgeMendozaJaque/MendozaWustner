<?php
session_start(); 

if (isset($_SESSION["usuario"])) {
    header("Location: paneladministracion.php");
    exit();
}

$error = $_GET["error"] ?? ""; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administración</title>
    <link rel="stylesheet" href="css/estilos.css?v=5.0">
</head>
<body class="pantalla-centrada">

    <main class="tarjeta-blanca tarjeta-pequena">
        <h1 class="titulo-secundario">Ingreso al sistema</h1>
        <p class="texto-gris margen-abajo-grande">Gestión de Cabañas</p>

        <?php if ($error === "CamposVacios") { ?>
            <div class="mensaje-error">Debe completar el usuario y contraseña.</div>
        <?php } ?>
       
        <?php if ($error === "datosIncorrectos") { ?>
            <div class="mensaje-error">Usuario o contraseña incorrectos.</div>
        <?php } ?>

        <form method="POST" action="validarLogin.php">
            
            <div class="grupo-formulario">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario">
            </div>
            
            <div class="grupo-formulario">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="clave" id="contrasena" placeholder="Ingrese su contraseña">
            </div>
            
            <button type="submit" class="btn btn-azul btn-ancho-total">Ingresar</button>
            <p class="texto-gris texto-chico texto-centrado">Desarrollado por: Jorge Mendoza Jaque</p>
            
        </form>
    </main>

</body>
</html>