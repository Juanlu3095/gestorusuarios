<?php
// OBTENEMOS USUARIO POR ID PARA INYECTARLO EN LA VENTANA MODAL PARA EDITAR LOS DATOS DESPUÉS

header('Content-Type: application/json');

include "conexion.php";
        try{
            $consulta = "SELECT * FROM users where id = ?";
            $id_user = $_GET["id"];
            $basedatos = new Conexion_db;
            $consulta_user = $basedatos->accesoDB()->prepare($consulta);
            $consulta_user->execute([$id_user]);
            $resultado = $consulta_user->fetchAll();
            echo json_encode($resultado);

        }catch(PDOexception $e){
            echo 'Se ha producido un error' . $e->getMessage();
        }
    

?>