<?php
$idClienteActualizar = intval($_POST["idClienteActualizar"] ?? 0);
$nuevoTelefono = trim($_POST["nuevoTelefono"] ?? "");

if ($idClienteActualizar <= 0 || $nuevoTelefono === "") {
    $mensajeSistema = "El ID del cliente es obligatorio y debes ingresar un nuevo teléfono.";
    $tipoMensaje = "error";
} else {
    // Actualizamos solo el teléfono buscando por el ID del cliente
    $sqlActualizarCliente = "UPDATE clientes SET telefono = ? WHERE idCliente = ?";
    $stmtActualizar = mysqli_prepare($conexionBd, $sqlActualizarCliente);
    
    // "si" significa String (teléfono) e Integer (ID)
    mysqli_stmt_bind_param($stmtActualizar, "si", $nuevoTelefono, $idClienteActualizar);
    mysqli_stmt_execute($stmtActualizar);

    if (mysqli_stmt_affected_rows($stmtActualizar) > 0) {
        $mensajeSistema = "Teléfono actualizado correctamente.";
        $tipoMensaje = "ok";
    } else {
        $mensajeSistema = "No se actualizó el registro. Revisa si el ID existe o si ingresaste el mismo teléfono.";
        $tipoMensaje = "error";
    }

    mysqli_stmt_close($stmtActualizar);
}
?>