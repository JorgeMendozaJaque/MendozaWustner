<?php
$nombre = trim($_POST["nombre"] ?? "");
$apellido = trim($_POST["apellido"] ?? "");
$rut = trim($_POST["rut"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$ciudad = trim($_POST["ciudad"] ?? "");

// El RUT lo dejamos opcional en el HTML, validamos los demás
if ($nombre === "" || $apellido === "" || $telefono === "" || $correo === "" || $ciudad === "") {
    $mensajeSistema = "Debe completar todos los campos obligatorios para registrar al cliente.";
    $tipoMensaje = "error";
} else { // si no hay nada 
    $sqlCrearCliente = "INSERT INTO clientes (nombre, apellido, rut, telefono, correo, ciudad) VALUES (?, ?, ?, ?, ?, ?)"; // se usa ? para prevenir inyecciones SQL
    $stmtCrear = mysqli_prepare($conexionBd, $sqlCrearCliente); //smtCrear es la variable que contiene la consulta preparada

    // "ssssss" porque todos los campos los tratamos como texto (strings)
    mysqli_stmt_bind_param($stmtCrear, "ssssss", $nombre, $apellido, $rut, $telefono, $correo, $ciudad);

    if (mysqli_stmt_execute($stmtCrear)) {
        $mensajeSistema = "Cliente registrado correctamente.";
        $tipoMensaje = "ok";
    } else {
        $mensajeSistema = "No se pudo registrar al cliente. Error en la base de datos.";
        $tipoMensaje = "error";
    }

    mysqli_stmt_close($stmtCrear); //cerramos la consulta preparada porque ya no la necesitamos ya que se ejecutó
}
?>