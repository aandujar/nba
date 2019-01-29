<?php

return array(
    "routes" => array(
        "/" => array(
            "route" => "/",
            "page" => "primera.php"
        ),

    "Historia" => array(
        "route" => "/historia",
        "page" => "historia.php"
    ),

    "Jugadores" => array(
        "route" => "/jugadores",
        "page" => "jugadores.php"
        ),

    "Jugador" => array(
        "route" => "/jugador/:idJugador",
        "page" => "jugador.php"
        ),

    "Login" => array(
        "route" => "/login",
        "page" => "login.php"
        ),

    "CompruebaLogin" => array(
            "route" => "/compruebaLogin",
            "page" => "compruebaLogin.php"
            ),

    "Logout" => array(
        "route" => "/logout",
        "page" => "logout.php"
        ),

    "Preferencias" => array(
        "route" => "/preferencias",
        "page" => "preferencias.php"
        ),    

    "CambiarAvatar" => array(
        "route" => "/cambiaravatar",
        "page" => "cambiaravatar.php"
        ),    

    "Registro" => array(
        "route" => "/registro",
        "page" => "registro.php"
        ), 

    "CompruebaRegistro" => array(
        "route" => "/compruebaregistro",
        "page" => "compruebaRegistro.php"
        ), 

    "Partidos" => array(
        "route" => "/partidos",
        "page" => "partidos.php"
        ),
        
    "Noticias" => array(
        "route" => "/noticias",
        "page" => "noticias.php"
        ),

    "Noticia" => array(
        "route" => "/noticia/:idNoticia",
        "page" => "noticia.php"
            ),

    "PublicarComentario" => array(
        "route" => "/publicarcomentario",
        "page" => "publicarComentario.php"
            ),

    ),
    "error" => "error.php"
);