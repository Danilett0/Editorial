<?php
include_once "../controllers/OperacionesDbController.php";

session_start();
$resultadoRev = null;

if (!$_SESSION['login']) {
    header('Location: ../index.php');
    exit();
}

$controller = new OperacionesDbController();
$consultaRevistas = $controller->buscarRevistas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="MensajeBienbenida">
        <p>Hola! <?= $_SESSION['userName'] ?></p>
        <p><?= $_SESSION['userCargo'] ?></p>
    </div>
    <div class="Menu">
        <a class="Button" href="nuevaRevista.php">Crear Revista</a>
        <h2>LISTADO DE REVISTAS EN LA EDITORIAL</h2>

        <div class="listadoRevistas">

            <?php

            if ($consultaRevistas) {
                for ($i = 0; $i < count($consultaRevistas); $i++) {

                    $articulosEnc = $controller->buscarArticulos($consultaRevistas[$i]['doc_revista']);
                    $nArt = count($articulosEnc) ?>

                    <div class="CardRevista Round">
                        <h4><?= $consultaRevistas[$i]['nombre'] ?></h4>
                        <p><?= $nArt > 1 ? $nArt . " Articulos" : $nArt . " Articulo" ?> </p>
                    </div>

                <?php }
            } else {
                echo "<h5> No se encontraron revistas creadas </h5>";
            } ?>
        </div>

    </div>
</body>

</html>