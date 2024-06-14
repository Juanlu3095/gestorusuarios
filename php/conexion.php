<?php
// CONEXIÓN A LA BASE DE DATOS

 class conexion_db{
    
    public function accesoDB(){

    $host = "localhost";
    $usuarios = "root";
    $clave = "";
    $db = "grupolaboral";

    try{
        $con = new PDO("mysql:host=$host;dbname=$db", $usuarios, $clave);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->exec("set names utf8");
        return $con;
    } catch(PDOException $e) {
        $err = $e->getCode();
        $msj = $e->getMessage();

        //Muestra errores si los hay
        echo "ERROR: " . $err . " " . $msj . "</p></div>";
    }
    return $con;
}
  
}

?>