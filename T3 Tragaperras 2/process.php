<?php
// Iniciar la sesión
session_start();

// Obtener la acción del formulario
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

// Obtener el valor actual de la variable de sesión o establecerlo en 0 si no está definida
$numero = isset($_SESSION['numero']) ? $_SESSION['numero'] : 0;

// Realizar las acciones según el botón presionado
switch ($accion) {
    case 'moneda':
        $numero++;
        break;
}

// Actualizar la variable de sesión
$_SESSION['numero'] = $numero;

// Redirigir a la página principal
header("Location: Tragaperras.php");
exit();
?>