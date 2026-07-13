<?php
$idClienteEliminar = intval($_POST["idClienteEliminar"] ?? 0);

if ($idClienteEliminar <= 0) {
    $mensajeSistema = "Debe indicar un ID válido para eliminar.";
    $tipoMensaje = "error";
} else {
    $sqlEliminarCliente = "DELETE FROM clientes WHERE idCliente = ?";
    $stmtEliminar = mysqli_prepare($conexionBd, $sqlEliminarCliente);

    // "i" para el Integer del ID
    mysqli_stmt_bind_param($stmtEliminar, "i", $idClienteEliminar);
    mysqli_stmt_execute($stmtEliminar);

    if (mysqli_stmt_affected_rows($stmtEliminar) > 0) {
        $mensajeSistema = "Cliente eliminado correctamente del sistema.";
        $tipoMensaje = "ok";
    } else {
        $mensajeSistema = "No se eliminó ningún registro. Revisa si el ID existe.";
        $tipoMensaje = "error";
    }

    mysqli_stmt_close($stmtEliminar);
}
?>