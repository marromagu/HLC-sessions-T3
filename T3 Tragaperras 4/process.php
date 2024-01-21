<?php
session_start();

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$monedas = isset($_SESSION['monedas']) ? $_SESSION['monedas'] : 0;
$premios = isset($_SESSION['premios']) ? $_SESSION['premios'] : 0;
switch ($accion) {
    case 'moneda':
        $_SESSION['monedas'] = ++$monedas;
        break;
    case 'jugar':
        if ($monedas > 0) {
            $_SESSION['monedas'] = --$monedas;
            $nuevaCombinacion = generarNuevaCombinacion();
            $_SESSION['frutas'] = $nuevaCombinacion;

            // Lógica de premios
            $cerezas = 0;
            foreach ($nuevaCombinacion as $imagen) {
                if (strpos($imagen, '1.svg') !== false) {
                    $cerezas++;
                }else{
                    $premios = 0;
                }
            }

            switch ($cerezas) {
                case 1:
                    $_SESSION['monedas'] += 1; // Se gana una moneda
                    $premios = 1;
                    break;
                case 2:
                    $_SESSION['monedas'] += 4; // Se ganan cuatro monedas
                    $premios = 4;
                    break;
                case 3:
                    $_SESSION['monedas'] += 10; // Se ganan diez monedas
                    $premios = 10;
                    break;
            }
            
        }
        break;
}

// Determinar la cara (triste o alegre) según si se ha ganado un premio
$cara = ($premios > 0) ? 'img\face-smile.svg' : 'img\face-sad.svg';

// Guardar el contador de premios en la sesión
$_SESSION['premios'] = $premios;

header("Location: Tragaperras.php?cara=$cara&premios=$premios");
exit();

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
?>
