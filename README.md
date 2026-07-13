# MendozaWustner

**Trabajo para Programación Web + IA**

El propósito de este archivo es documentar todos los recursos utilizados en el desarrollo de este proyecto web, realizado por Jorge Mendoza. El proyecto integra los contenidos vistos en clases, incluyendo CSS, PHP, HTML, bases de datos e Inteligencia Artificial (IA).

## Contexto

Este trabajo está orientado a un negocio de cabañas, cuyo flujo de trabajo consiste en recibir información de futuros clientes para luego contactarlos. El flujo es el siguiente:

1. El usuario ingresa a la página `index.php`.
2. Visualiza la cabaña y gestiona el contacto.
3. Espera a ser llamado para coordinar una reserva de forma presencial.

Este proyecto responde a los requerimientos de los dueños. Ellos son  personas de la tercera edad y manejan mejor el papel que un computador, por lo que se prioriza el contacto humano por sobre la automatización total del proceso.

El objetivo del proyecto es construir un **CRUD básico** que permita a los administradores (dueños) gestionar clientes, funcionando como una base sólida y escalable para futuras mejoras.

## Landing Page

Nuestra página de inicio es una *landing page* (página de aterrizaje) que muestra las características de la cabaña. Al llegar al final, el usuario encuentra un botón de contacto que lo redirige al formulario. El diseño fue consultado con IA, buscando una estética genérica pero atractiva al mismo tiempo.

## Formulario

Utilizando los mismos estilos CSS de la landing page, se desarrolló un formulario que captura los datos del cliente y los envía mediante `POST` a la base de datos, para su posterior consulta. Se priorizó en todo momento la eficiencia del código.

## exito.html

La página `exito.html` es un complemento visual para dar mayor profesionalismo al flujo del formulario. Mediante la etiqueta:

```html
<meta http-equiv="refresh" content="5;url=index.php">
```

se configura un temporizador que redirige automáticamente al usuario a `index.php` tras 5 segundos, aportando dinamismo y una experiencia más pulida.

## Inteligencia Artificial

La IA se utilizó principalmente para dos fines:

- **Estilos CSS:** se elaboraron prompts detallados, aplicando buenas prácticas de *prompt engineering* para obtener resultados consistentes y de calidad.
- **Estructura HTML:** se consultó para asegurar un orden y una jerarquía visual adecuados en el markup.