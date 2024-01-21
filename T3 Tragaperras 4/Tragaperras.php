<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style3.css">
    <title>Tragaperras 3</title>
</head>

<body>
    <h1>Tragaperras 3</h1>
    <table>
        <tr>
            <?php
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

            session_start();


            $monedas = isset($_SESSION['monedas']) ? $_SESSION['monedas'] : 0;
            $frutas = isset($_SESSION['frutas']) ? $_SESSION['frutas'] : generarNuevaCombinacion();
            $premios = isset($_SESSION['premios']) ? $_SESSION['premios'] : 0;
            $cara = isset($_GET['cara']) ? $_GET['cara'] : '';

            foreach ($frutas as $imagen) {
                $ancho = 200; // ajusta el ancho de la imagen
                $alto = 100; // ajusta el alto de la imagen
                echo '<td><img src="' . $imagen . '" alt="Imagen" style="width: ' . $ancho . 'px; height: ' . $alto . 'px;"></td>';
            }
            ?>
            <td class="dividida" colspan="2">
                <form action="process.php" method="post">
                    <button type="submit" name="accion" value="moneda">Meter Moneda</button>
                    <?php
                    echo "<p>$monedas</p>";
                    ?>
                    <button type="submit" name="accion" value="jugar" <?php echo ($monedas <= 0) ? 'disabled' : ''; ?>>Jugar</button>
                </form>
            </td>
                <?php
                echo '<td><img src="' . $cara . '" alt="Imagen" style="width: ' . $ancho . 'px; height: ' . $alto . 'px;"></td>';
                echo "<td><p>$premios</p></td>";
                ?>
        </tr>
    </table>
</body>

</html>