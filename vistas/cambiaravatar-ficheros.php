<?php
//indica ruta de avatares y recojo nombre de avatar
$rutaSubida = ROOT2 . DT . AVATARES . DT; 
$ficheroSubida = $rutaSubida . basename($_FILES['nuevoAvatar']['name']);
//si el archivo se sube correctamente
if(move_uploaded_file($_FILES['nuevoAvatar']['tmp_name'], $ficheroSubida)){
    //cambio avatar del usuario en variable de sesion
   $_SESSION["avatar"] = basename($_FILES['nuevoAvatar']['name']);
   setcookie("cookieUsuario",$_SESSION["username"] . "/" . $_SESSION["avatar"],time()+604800);
   //setcookie("cookieUsuario",$_SESSION['username'] . "/" . $_SESSION['avatar'],time()+604800)
   $rutaFichero = ROOT2 . DT . USUARIOS . DT . 'usuarios.txt';
   //creo array con fichero usuarios
   $ficheroUsuarios = file($rutaFichero);
   $contador = 0;
   $borrar;
   $user;
   $password;
   foreach($ficheroUsuarios as $lineas){
       //recorro array y separo cada linea
       $trozos = explode(";",$lineas);
       $usuarioRecorrer = $trozos[0];
       //si el usuario coincide con el logado
       if ($usuarioRecorrer==$_SESSION["username"]){
           //guardo password encriptado y posicion a borrar
           $password = $trozos[1];
           $borrar = $contador;
           }
       $contador++;
   }
   //borro linea del usuario logado y elimino fichero de usuarios
   unset($ficheroUsuarios[$borrar]);
   unlink($rutaFichero);
   //creo fichero de usuarios
   $fichero = fopen($rutaFichero,"a");
   foreach($ficheroUsuarios as $line){
       //recorro array de usuarios e inserto los datos en el fichero
       fwrite($fichero,$line);
   }
   //inserto en el fichero los datos del usuario logado
   fwrite($fichero,$_SESSION["username"] . ";" . $password . ";" . $_SESSION["avatar"] . PHP_EOL);
   fclose($fichero);
   //redirijo a pagina principal
   header("Location: /");
}

else{
    echo  "Error: " . $_FILES['nuevoAvatar']['error'];
    echo "    -----------------    ";
    print_r($_FILES);
}

