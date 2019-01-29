<?php
$conexion = new PDO('mysql:host=localhost;dbname=nba','andujar','andujar');
session_start();
$_SESSION["logueado"];
function compruebaLogin(){
    if(isset($_COOKIE["cookieUsuario"])){
        $_SESSION["logueado"]="noError";
        //saco de la cookie el nombre y el avatar del usuario y los añado a variables de sesion
        $informacionUsuario = $_COOKIE["cookieUsuario"];
        $valores = explode("/",$informacionUsuario);
        $_SESSION["username"] = $valores[0];
        $_SESSION["avatar"] = $valores[1];
    }
}

compruebaLogin();


include "config.php";
$routes = include "routes.php";
$page = null;
$uri = trim($_SERVER["REQUEST_URI"],"/");

foreach($routes["routes"] as $currentRoute){
    $route = trim($currentRoute["route"],"/");
    $routerPattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$#D";
    $matchesParams = array();
    if(preg_match_all($routerPattern, $uri, $matchesParams)){
        $keys = array();
        $params = array();
        array_shift($matchesParams);
        preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys);
        array_shift($keys);
        for($i=0; $i<count($keys[0]);$i++){
            $params[$keys[0][$i]] = $matchesParams[$i][0];
        }
        $page = $currentRoute["page"];
}

}


if($page != null){
    include_once(VISTAS . DT . $page);
}else{
    include_once(VISTAS . DT . $routes["error"]);
}


