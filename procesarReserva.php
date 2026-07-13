<?php
// 1. Llamamos a nuestra conexión centralizada
require_once 'conexionDB.php';

// Verificamos que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Capturar los datos
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $rut = trim($_POST['rut']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $ciudad = trim($_POST['ciudad']);

    // 3. Preparar la consulta
    $sql = "INSERT INTO clientes (nombre, apellido, rut, telefono, correo, ciudad) VALUES (?, ?, ?, ?, ?, ?)";

    
    $stmt = $conexionBd->prepare($sql); 

    if ($stmt) {
        $stmt->bind_param("ssssss", $nombre, $apellido, $rut, $telefono, $correo, $ciudad);

        // 4. Ejecutar y notificar
        if ($stmt->execute()) {
            // Redirige al usuario al inicio con un mensaje de éxito en la URL
            header("Location: exito.html");
            exit();
        } else {
            echo "Error al guardar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        
        echo "Error en la consulta: " . $conexionBd->error;
    }
} else {
    echo "Acceso denegado.";
}


$conexionBd->close();
