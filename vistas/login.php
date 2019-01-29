<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?=ROOT . DT . CSS . DT . 'style.css'?>">
</head>
<body>
<?php
include "cabecera.php";
?>
<div class="formulario">
<form action="/compruebaLogin" method="post" name="formularioLogin">
<input type="text" class="log" name="user" PlaceHolder="Nombre de usuario">
<br />
<br />
<input type="password" class="log" name="password" PlaceHolder="Password">
<br />
<br />
<input type="submit" class="boton" name="enviar" value="OK">
</form>
</div>
<?php
    //si la variable de sesion es igual a error muestro mensaje de usuario/contraseña incorrectos
    if($_SESSION["logueado"]=="error"){
        echo "<div class='mensajeError'>";
        echo "<p>El usuario o la contraseña introducidos no son correctos</p></div>";
    }
    //modifico la variable para que desaparezca el mensaje de error al cambiar la pagina
    $_SESSION["logueado"]="noError";
?>
</body>
</html>
