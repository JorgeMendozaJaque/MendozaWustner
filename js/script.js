
// 1. CONFIRMACIÓN PARA ELIMINAR CLIENTES 
document.addEventListener('DOMContentLoaded', function() {
    
    document.addEventListener('click', function(evento) {
        if (evento.target.closest('.formulario-eliminar .btn-rojo')) {
            let confirmacion = confirm("¿Estás seguro de que deseas eliminar a este cliente? Esta acción no se puede deshacer.");
            if (!confirmacion) {
                evento.preventDefault(); 
            }
        }
    });

});

// 2. VALIDACIÓN DEL FORMULARIO DE INSCRIPCIÓN
function validarReserva(event) {
    let nombre = document.getElementById('nombre').value.trim();
    let apellido = document.getElementById('apellido').value.trim();
    let telefono = document.getElementById('telefono').value.trim();
    let correo = document.getElementById('correo').value.trim();
    let ciudad = document.getElementById('ciudad').value.trim();

    // Validar que los campos obligatorios no estén vacíos
    if (nombre === "" || apellido === "" || telefono === "" || correo === "" || ciudad === "") {
        alert("Por favor, complete todos los campos obligatorios.");
        event.preventDefault(); 
        return false;
    }

    // Validación de correo
    if (!correo.includes("@") || !correo.includes(".")) {
        alert("Por favor, ingrese un correo electrónico válido.");
        event.preventDefault();
        return false;
    }
    
    if (correo.length > 100) {
        alert("El correo electrónico no debe exceder los 100 caracteres.");
        event.preventDefault();
        return false;
    }

    // Validación de longitud de teléfono
    if (telefono.length < 7 || telefono.length > 15) {
        alert("El número de teléfono debe tener entre 7 y 15 dígitos.");
        event.preventDefault();
        return false;
    }

    // Validación de solo números en el teléfono
    if (!/^\d+$/.test(telefono)) {
        alert("El número de teléfono solo debe contener dígitos.");
        event.preventDefault();
        return false;
    }

    // Validación de longitud máxima para textos
    if (nombre.length > 50 || apellido.length > 50 || ciudad.length > 50) {
        alert("Los campos de nombre, apellido y ciudad no deben exceder los 50 caracteres.");
        event.preventDefault();
        return false;
    }

    // Validación de solo letras y espacios (ahora incluye tildes y ñ)
    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!regexLetras.test(nombre) || !regexLetras.test(apellido) || !regexLetras.test(ciudad)) {
        alert("Los campos de nombre, apellido y ciudad solo deben contener letras y espacios.");
        event.preventDefault();
        return false;
    }

  
    return true;
}