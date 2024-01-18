<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Tragaperras 1</title>
</head>

<body>
    <table>
        <tr>
            <?php
            // Array de nombres de archivo de imágenes dentro de la carpeta "frutas"
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
            // Seleccionar tres frutas al azar
            $frutasAleatorias = array_rand($imagenes, 3);

            foreach ($frutasAleatorias as $indice) {
                $imagen = $imagenes[$indice];
                $ancho = 300; // ajusta el ancho de la imagen
                $alto = 200; // ajusta el alto de la imagen
                echo '<td><img src="' . $imagen . '" alt="Imagen" style="width: ' . $ancho . 'px; height: ' . $alto . 'px;"></td>';
            }
            ?>
        </tr>
    </table>
</body>

</html>