<?php
$textoBusqueda = trim($_GET["textoBusqueda"] ?? "");

if ($textoBusqueda !== "") {
    // Escapamos el texto para evitar inyecciones SQL
    $textoBusquedaSeguro = mysqli_real_escape_string($conexionBd, $textoBusqueda);
    $busquedaLike = "%" . $textoBusquedaSeguro . "%";

    // Buscamos coincidencias en el nombre, apellido o RUT
    $sqlLeerClientes = "SELECT idCliente, nombre, apellido, rut, telefono, correo, ciudad
                        FROM clientes
                        WHERE nombre LIKE '$busquedaLike'
                           OR apellido LIKE '$busquedaLike'
                           OR rut LIKE '$busquedaLike'
                        ORDER BY idCliente ASC";
} else {
    // Si no hay búsqueda, mostramos todo
    $sqlLeerClientes = "SELECT idCliente, nombre, apellido, rut, telefono, correo, ciudad
                        FROM clientes
                        ORDER BY idCliente ASC";
}

$resultadoClientes = mysqli_query($conexionBd, $sqlLeerClientes);

if (!$resultadoClientes) {
    die("Error al consultar clientes: " . mysqli_error($conexionBd));
}
?>