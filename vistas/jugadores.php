<html>
<head>
<title>Jugadores</title>
</head>
<body>
<?php
include "cabecera.php";
$sql = "SELECT codigo,foto FROM jugadores WHERE Nombre_equipo = 'Lakers'";
foreach($conexion->query($sql) as $row){
    $ruta = "/jugador/" . $row['codigo'];//la ruta es jugador mas el codigo del jugador en la bd
    $rutaFoto = ROOT . DT . IMAGENES . DT . $row['foto'];
        echo '<a href="'.$ruta.'"><img src="'.$rutaFoto.'" height="250" width="250"></a>'; //inserta imagen con ruta
}
?>
</body>
</html>
