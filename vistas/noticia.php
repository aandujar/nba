<html>
<head>
<meta charset="UTF-8">
<title>Noticias</title>
<link rel="stylesheet" type="text/css" href="<?=ROOT . DT . CSS . DT . 'style.css'?>">
</head>
<body>
<?php
include "cabecera.php";
$key = $keys[0][0];
$idNoticia = $params[$key];

if($_SESSION["errorComentario"]==true){
    echo '<div class="mensajeError">Debes logarte para publicar comentarios</div>';
    $_SESSION["errorComentario"]= false;
}
if($_SESSION["errorComentario2"]==true){
    echo '<div class="mensajeError">No puedes publicar mensajes vacíos</div>';
    $_SESSION["errorComentario2"]= false;
}

$sql = 'SELECT titulo,cuerpo FROM noticia WHERE id = :id';
$sth = $conexion->prepare($sql);
$sth->bindParam(':id',$idNoticia,PDO::PARAM_INT);
$sth->execute();
$resultado = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach($resultado as $row){
    echo '<div class="noticia"><h2 class="titulo">'.$row['titulo'].'</h2><p>'.$row['cuerpo'].'</p>';
}
$sql2 = 'SELECT id,comentario,idUsuario FROM comentarios WHERE idNoticia = :id';
$sth2 = $conexion->prepare($sql2);
$sth2->bindParam(':id',$idNoticia,PDO::PARAM_INT);
$sth2->execute();
$resultado2 = $sth2->fetchAll(PDO::FETCH_ASSOC);
$nombreUsuario;
$tam = sizeof($resultado2);

echo '<h2 class="tituloComentarios">Comentarios</h2>';
echo '<hr />';
echo '<form action="/publicarcomentario" name="formulario" method="post">';
echo '<input type="text" name="comentario" class="formularioComentario"><br />';
echo '<input type="hidden" name="idNoticia" value='.$idNoticia.'>';
echo '<input type="submit" value="Publicar comentario" class="botonComentario">';
echo '</form>';


if($tam==0){
    echo '<p>Todavía no hay comentarios publicados</p>';
}else{
    foreach($resultado2 as $row2){
        $sql3 = 'SELECT nombreUsuario from usuarios where id = :id';
        $sth3 = $conexion->prepare($sql3);
        $idUsuario = $row2['idUsuario'];
        $sth3->bindParam(':id',$idUsuario,PDO::PARAM_INT);
        $sth3->execute();
        $resultado3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
        $tam2 = sizeof($resultado3);
        foreach($resultado3 as $row3){
            $nombreUsuario = $row3['nombreUsuario'];
        }
        echo '<div class="divComentario"><p>'.$row2['id'].' - ' . $nombreUsuario . '</p>';
        echo '<p>'. htmlspecialchars($row2['comentario']) .'</p></div>';
    }
}
echo '</div>';
?>

</body>
</html>
