<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Examen 1ª Evaluación</title>
    <link rel="stylesheet" type="text/css" media="screen" href="estilos.css" />
</head>
<body>
<?php
    include "menu.php";
?> 

<div id="content">
<form action="comprobarRegistro.php" method="post" name="formularioRegistro" enctype="multipart/form-data">
<input type="text" class="log" name="usuario" PlaceHolder="Nombre de usuario">
<br />
<br />
<input type="password" class="log" name="password" PlaceHolder="Password">
<br />
<br />
<input type="hidden" name="MAX_FILE_SIZE" value="1600000" />
Elige el avatar<input name="avatar" type="file" accept="image/*"/>
<br />
<br />
<input type="submit" class="boton" name="enviar" value="Crear usuario">
</form>
</div>
</body>
</html>
