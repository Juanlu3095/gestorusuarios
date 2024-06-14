<?php
// AÑADIMOS USUARIO DESDE VENTANA MODAL

include "conexion.php";

if(!empty($_POST['add_dni_user']) && !empty($_POST['add_nombre_user']) && !empty($_POST['add_fecha_user']) && !empty($_POST['add_telefono_user']) && !empty($_POST['add_email_user']) ) {

$dni = $_POST['add_dni_user'];
$nombre = $_POST['add_nombre_user'];
$fecha_nacimiento = $_POST['add_fecha_user'];
$telefono = $_POST['add_telefono_user'];
$email = $_POST['add_email_user'];

try{
    $consulta = "INSERT into users (dni, nombre_usuario, fecha_nacimiento, telefono, email) values (?,?,?,?,?)";
    $basedatos = new conexion_db;
    $consulta_user = $basedatos->accesoDB()->prepare($consulta);
    $resultado = $consulta_user->execute([$dni, $nombre, $fecha_nacimiento, $telefono, $email]);
    
    if($resultado){
        header('Location: ../index.php');
        exit();

    } else {
        echo 'Se ha producido un error, vuelva a intentarlo de nuevo.';
    }
    

} catch(PDOexception $e) {
    echo 'Se ha producido un error' . $e->getMessage();
}
}

?>