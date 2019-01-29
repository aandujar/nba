<html>
<head>
<meta charset="UTF-8">
<title>Jugador</title>
</head>
<body>
<?php
$key = $keys[0][0];
$idJugador = $params[$key];
include ROOT2 . DT .VISTAS . DT . "cabecera.php";
$sql = 'SELECT * from jugadores WHERE codigo = :id';
$sth = $conexion->prepare($sql);
$sth->bindParam(':id',$idJugador,PDO::PARAM_INT);
$sth->execute();
$resultado = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<table border=2 class='tabla'><tr><th>Codigo</th><th>Nombre</th><th>Procedencia</th><th>Altura</th><th>Peso</th><th>Posicion</th><th>Equipo</th>";
foreach ($resultado as $row){
    echo "<tr><td>" . $row['codigo'] . "</td>";
    echo "<td>" . $row['Nombre'] . "</td>";
    echo "<td>" . $row['Procedencia'] . "</td>";
    echo "<td>" . $row['Altura'] . "</td>";
    echo "<td>" . $row['Peso'] . "</td>";
    echo "<td>" . $row['Posicion'] . "</td>";
    echo "<td>" . $row['Nombre_equipo'] . "</td></tr>";
    $foto = ROOT . DT . IMAGENES . DT . $row['foto'];
    echo '<tr><td colspan=7><img src="'.$foto.'" height=400px width=100%></td></tr>';
}
echo "</table>";
?>
</body>
<html>