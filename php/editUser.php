<?php
// EDITAMOS USUARIO DESDE LA VENTANA MODAL

include "conexion.php";

if(!empty($_POST['id_edit_user']) && !empty($_POST['edit_dni_user']) && !empty($_POST['edit_nombre_user']) && !empty($_POST['edit_fecha_user']) && !empty($_POST['edit_telefono_user']) && !empty($_POST['edit_email_user'])) {

$id_user = $_POST['id_edit_user']; // Este campo lo obtenemos del type="hidden"
$dni = $_POST['edit_dni_user'];
$nombre = $_POST['edit_nombre_user'];
$fecha_nacimiento = $_POST['edit_fecha_user'];
$telefono = $_POST['edit_telefono_user'];
$email = $_POST['edit_email_user'];

try{
    $consulta = "UPDATE users SET dni = ?, nombre_usuario = ?, fecha_nacimiento = ?, telefono = ?, email = ? where id = ?";
    $basedatos = new conexion_db;
    $consulta_user = $basedatos->accesoDB()->prepare($consulta);
    $resultado = $consulta_user->execute([$dni, $nombre, $fecha_nacimiento, $telefono, $email, $id_user]);
    
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