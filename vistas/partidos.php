<html>
<head>
<meta charset="UTF-8">
<title>Partidos</title>
<link rel="stylesheet" type="text/css" href="<?=ROOT . DT . CSS . DT . 'style.css'?>">
</head>
<body>
<?php
include "cabecera.php";

echo "<h3>Selecciona el año para ver los partidos disputados</h3>";
try{
    echo "<form method='POST' action='/partidos'>";
    echo "<select name='lista' id='lista' onchange='this.form.submit()'>";
    $sql = 'SELECT DISTINCT temporada FROM partidos';
    $sth = $conexion->prepare($sql);
    $sth->execute();
    $resultado = $sth->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $row){
        $temporada = $row['temporada'];
        echo "<option value='$temporada'>".$temporada."</option>";
    }

    echo "</select></form>";

    if(isset($_POST['lista'])){
        $temporada = $_POST['lista'];
        $sql2 = 'SELECT * FROM partidos WHERE temporada = :temporada AND (equipo_local= "Lakers" OR equipo_visitante = "Lakers")';
        $sth = $conexion->prepare($sql2);
        $sth->bindParam(':temporada',$temporada,PDO::PARAM_STR);
        $sth->execute();
        $resultado = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=2>";
        echo "<tr><th>Código</th><th>Equipo Local</th><th>Equipo Visitante</th><th>Puntos Local</th><th>Puntos Visitante</th><th>Temporada</th></tr>";
        foreach ($resultado as $row) {
            echo "<tr><td>".$row['codigo']."</td>";
            echo "<td>".$row['equipo_local']."</td>";  
            echo "<td>".$row['equipo_visitante']."</td>";
            echo "<td>".$row['puntos_local']."</td>";
            echo "<td>".$row['puntos_visitante']."</td>";
            echo "<td>".$row['temporada']."</td></tr>";
        }
        echo "</table>";
    }
}catch(PDOException $e){//error conectar bd
        echo "<div class='mensajeError'>";
        echo "<p>Error al conectar a la bd. Intentálo nuevamente</p></div>";
}
?>
</div>
</body>
</html>
