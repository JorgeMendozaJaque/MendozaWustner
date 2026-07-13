<?php
session_start();
// Si no hay sesión iniciada, redirige al login
if (!isset($_SESSION["usuario"])) {
    header("Location: loginpaneladministracion.php");
    exit();
}

require_once "conexionDB.php";

$mensajeSistema = ""; // Variable para almacenar mensajes del sistema
$tipoMensaje = "info";

$accionConsulta = $_POST["accionConsulta"] ?? ""; // Variable para determinar la acción a realizar

if ($accionConsulta === "agregarCliente") {
    require_once "agregarCliente.php";
}

if ($accionConsulta === "actualizarCliente") {
    require_once "actualizarCliente.php";
}

if ($accionConsulta === "eliminarCliente") {
    require_once "eliminarCliente.php";
}

require_once "mostrarCliente.php";

// Función adaptada a las columnas de la tabla 'clientes' y a las nuevas clases CSS
function mostrarTablaClientes($resultadoClientes)
{
    echo "<table class='tabla-datos'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>RUT</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Correo</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Actualizar Teléfono</th>";
    echo "<th>Eliminar</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    if ($resultadoClientes && mysqli_num_rows($resultadoClientes) > 0) {
        while ($cliente = mysqli_fetch_assoc($resultadoClientes)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($cliente["idCliente"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["apellido"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["rut"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["telefono"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["correo"]) . "</td>";
            echo "<td>" . htmlspecialchars($cliente["ciudad"]) . "</td>";

            // Formulario en línea para actualizar el teléfono 
            echo "<td>";
            echo "<form method='POST' class='fila-acciones'>";
            echo "<input type='hidden' name='accionConsulta' value='actualizarCliente'>";
            echo "<input type='hidden' name='idClienteActualizar' value='" . htmlspecialchars($cliente["idCliente"]) . "'>";
            echo "<input type='text' name='nuevoTelefono' placeholder='Nuevo teléfono'>";
            echo "<button type='submit' class='btn btn-azul btn-pequeno'>Actualizar</button>";
            echo "</form>";
            echo "</td>";

            // Formulario en línea para eliminar cliente 
            echo "<td>";
            echo "<form method='POST' class='formulario-eliminar'>";
            echo "<input type='hidden' name='accionConsulta' value='eliminarCliente'>";
            echo "<input type='hidden' name='idClienteEliminar' value='" . htmlspecialchars($cliente["idCliente"]) . "'>";
            echo "<button type='submit' class='btn btn-rojo btn-pequeno'>Eliminar</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='9'>No se encontraron registros de clientes.</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Cabañas</title>

    <link rel="stylesheet" href="css/estilos.css?v=7.0">
</head>

<body class="fondo-gris">

    <main>

        <!-- Cabecera envuelta en una tarjeta ancha transparente -->
        <div class="tarjeta-ancha">
            <div class="cabecera-panel">
                <div>
                    <h1 class="titulo-principal">Gestión de Clientes - Cabañas</h1>
                    <span class="texto-gris">Hola, <strong><?php echo htmlspecialchars($_SESSION["usuario"]); ?></strong>. Bienvenido al panel principal.</span>
                </div>
                <a href="deslogeo.php" class="btn btn-rojo">Cerrar sesión</a>
            </div>

            <?php if ($mensajeSistema !== "") { ?>
                <div class="mensaje-<?php echo htmlspecialchars($tipoMensaje); ?> margen-abajo-grande">
                    <?php echo htmlspecialchars($mensajeSistema); ?>
                </div>
            <?php } ?>
        </div>

        <section class="tarjeta-blanca tarjeta-ancha">
            <h2 class="titulo-secundario">Buscar Cliente</h2>

            <form method="GET">
                <div class="buscador-panel">
                    <input
                        type="text"
                        name="textoBusqueda"
                        placeholder="Buscar por nombre, apellido o RUT"
                        value="<?php echo htmlspecialchars($textoBusqueda ?? ""); ?>">
                    <button type="submit" class="btn btn-azul">Buscar</button>
                    <a href="paneladministracion.php" class="btn btn-gris">Mostrar todos</a>
                </div>
            </form>
        </section>

        <section class="tarjeta-blanca tarjeta-ancha">
            <h2 class="titulo-secundario">Clientes Registrados</h2>
            <?php mostrarTablaClientes($resultadoClientes ?? null); ?>
        </section>

        <section class="tarjeta-blanca tarjeta-ancha">
            <h2 class="titulo-secundario">Agregar Cliente Manualmente</h2>

            <form method="POST">
                <input type="hidden" name="accionConsulta" value="agregarCliente">

                <div class="cuadricula-entradas">
                    <div class="grupo-formulario">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Ej: Juan" required>
                    </div>
                    <div class="grupo-formulario">
                        <label>Apellido</label>
                        <input type="text" name="apellido" placeholder="Ej: Pérez" required>
                    </div>
                    <div class="grupo-formulario">
                        <label>RUT (Opcional)</label>
                        <input type="text" name="rut" placeholder="Ej: 12345678-9">
                    </div>
                    <div class="grupo-formulario">
                        <label>Teléfono</label>
                        <input type="tel" name="telefono" placeholder="Ej: 987654321" required>
                    </div>
                    <div class="grupo-formulario">
                        <label>Correo Electrónico</label>
                        <input type="email" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="grupo-formulario">
                        <label>Ciudad</label>
                        <input type="text" name="ciudad" placeholder="Ej: Temuco" required>
                    </div>
                </div>

                <!-- Botón fuera de la cuadrícula para ocupar todo el ancho -->
                <button type="submit" class="btn btn-verde btn-ancho-total">Agregar Cliente</button>
            </form>
        </section>

    </main>
    <script src="js/script.js?v=1.1"></script>
</body>

</html>