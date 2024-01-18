<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style2.css">
    <title>Tragaperras </title>
</head>

<body>
    <h1>Tragaperras 2</h1>
    <table>
        <tr>
            <?php
            // Iniciar la sesión
            session_start();

            // Obtener el valor actual de la variable de sesión o establecerlo en 0 si no está definida
            $numero = isset($_SESSION['numero']) ? $_SESSION['numero'] : 0;
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
                $ancho = 200; // ajusta el ancho de la imagen
                $alto = 100; // ajusta el alto de la imagen
                echo '<td><img src="' . $imagen . '" alt="Imagen" style="width: ' . $ancho . 'px; height: ' . $alto . 'px;"></td>';
            }
            ?>
            <td class="dividida" colspan="2"> <!-- Establecer colspan="2" para ocupar dos columnas -->
                <form action="process.php" method="post">
                    <button type="submit" name="accion" value="moneda">Meter Moneda</button>
                    <?php
                    //Bloque php para mostar el numero
                    echo "<p>$numero</p>";
                    ?>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>