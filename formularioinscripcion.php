<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Cabañas</title>
    <link rel="stylesheet" href="css/estilos.css?v=5.0">
</head>
<body class="fondo-gris">

    <nav class="barra-navegacion">
        <div class="logotipo">GestiónCabañas</div>
        <ul class="enlaces-navegacion">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="formularioinscripcion.php">Formulario</a></li>
            <li><a href="loginpaneladministracion.php" class="btn btn-rojo btn-pequeno">Administración</a></li>
        </ul>
    </nav>

    <main class="tarjeta-blanca tarjeta-grande" id="formulario">
        <h2 class="titulo-principal texto-centrado">Formulario de Contacto</h2>
        <p class="texto-gris texto-centrado margen-abajo-grande">Complete los siguientes datos para enviar su información.</p>

        <form id="formularioReserva" onsubmit="return validarReserva(event)" action="procesarReserva.php" method="POST">

            <fieldset>
                <legend>Datos Personales</legend>
                <div class="cuadricula-entradas">
                    
                    <div class="grupo-formulario">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" placeholder="Ej: Pérez" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="rut">RUT (Opcional):</label>
                        <input type="text" id="rut" name="rut" placeholder="Ej: 12345678-9">
                    </div>

                    <div class="grupo-formulario">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Ej: 987654321" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="ciudad">Ciudad de origen:</label>
                        <input type="text" id="ciudad" name="ciudad" placeholder="Ej: Temuco" required>
                    </div>

                </div>
            </fieldset>

            <button type="submit" class="btn btn-verde btn-ancho-total">Enviar Información</button>

        </form>
    </main>

    <script src="js/script.js?v=3.2"></script>

</body>
</html>