<?php
    //recojo datos de formulario
    $user = trim($_POST["user"]);
    $password = $_POST["password"];
    $avatarUsuario = null;
    $usuarios = [];
    //creo array con fichero de usuarios
    $lines = file(ROOT . DT . USUARIOS . DT . 'usuarios.txt');
   
    foreach($lines as $line){
        //recorro array y voy separando los datos de cada usuarios
        $valores = explode(";",$line);
        //creo un array insertando los datos de cada usuario
        $arrayInsertar = [
            $valores[0],
            $valores[1],
            $valores[2]
        ];
        //voy insertando en el array que voy a utilizar el array con los datos de los usuarios
        array_push($usuarios,$arrayInsertar);
    }
    //creo variable con informacion de si se ha creado la cookie
    $cookieCreada = false;
    //recorro array de usuarios
    foreach($usuarios as $usuario){
        if($user==$usuario[0] && crypt($password,$usuario[1]) == $usuario[1]){
            //si coinciden usuario y contraseña cookie creada es true, guardo nombre del avatar, creo cookie y redirijo a pagina principal
            $cookieCreada = true;
            $avatarUsuario = $usuario[2];
           //value de la cookie es igual al nombre y avatar del usuario
            $informacionUsuario = $user . "/" . $avatarUsuario;
            setcookie("cookieUsuario",$informacionUsuario,time()+604800);
            header("Location: /");
        }
    }
    //si no se crea la cookie, variable de sesion es igual a error para mostrar mensaje de error en login
    $_SESSION["logueado"] = "error";
    if($cookieCreada==false){
        //redirijo a login
        header("Location: /login");
    }