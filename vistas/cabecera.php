<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=ROOT . DT . CSS . DT . 'style.css'?>">
</head>
<body>
<?php

echo "<div class='cabecera'>";
echo "<h1>Los Angeles Lakers</h1>";
echo "<nav><ul class='nav'><li><a href='/'>Pagina principal</a></li><li><a href='/historia'>Historia</a></li><li><a href='/jugadores'>Jugadores</a></li><li><a href='/partidos'>Partidos</a></li><li><a href='/noticias'>Noticias</a></li>";
if(!isset($_COOKIE["cookieUsuario"])){
    //si no existe la cookie muestro la opcion de login y registro
    echo "<li><a href='/registro' class='registro'>Registro</a></li><li><a href='/login'>Login</a></li>";
}else{
    //si existe la cookie muesto el avatar y las opciones de preferencias y logout
    $ruta = ROOT . DT . AVATARES . DT . $_SESSION["avatar"];
    echo "<li><img class='imagen' src='$ruta'><ul><li><a href='/preferencias'>Preferencias</a></li><li><a href='/logout'>Logout</a></li></ul></li>";
    
}

echo "</ul></nav></div>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";
?>



</body>
</html>
