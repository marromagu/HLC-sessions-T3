<?php
session_start();

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$monedas = isset($_SESSION['monedas']) ? $_SESSION['monedas'] : 0;

switch ($accion) {
    case 'moneda':
        $_SESSION['monedas'] = ++$monedas;
        break;
    case 'jugar':
        if ($monedas > 0) {
            $_SESSION['monedas'] = --$monedas;
            $_SESSION['frutas'] = generarNuevaCombinacion();
        }
        break;
}

function generarNuevaCombinacion()
{
    $imagenes = [
        'img/frutas/1.svg',
        'img/frutas/2.svg',
        'img/frutas/3.svg',
        'img/frutas/4.svg',
        'img/frutas/5.svg',
        'img/frutas/6.svg',
        'img/frutas/7.svg',
        'img/frutas/8.svg',
    ];

    $frutasAleatorias = array_rand($imagenes, 3);
    $nuevaCombinacion = [];

    foreach ($frutasAleatorias as $indice) {
        $nuevaCombinacion[] = $imagenes[$indice];
    }

    return $nuevaCombinacion;
}
header("Location: Tragaperras.php");
exit();

?>