<html>
<head>
<meta charset="UTF-8">
<title>Noticias</title>
<link rel="stylesheet" type="text/css" href="<?=ROOT . DT . CSS . DT . 'style.css'?>">
</head>
<body>
<?php
include "cabecera.php";
$sql = 'SELECT id,titulo FROM noticia';
echo '<div class="noticia">';
foreach($conexion->query($sql) as $row){
    $ruta = "/noticia/" . $row['id'];
    $titulo = $row['titulo'];
    echo '<div><a href="'.$ruta.'"><h2>'.$titulo.'</h2></a></div>';
}
echo '</div>';
?>
</div>
</body>
</html>
