<?php
// OBTENEMOS TODOS LOS USUARIOS

        include "conexion.php";

        // Obtenemos todos los usuarios con límite de datos obtenidos y desplazamiento
        function obtenerUsers($limit, $offset) {
            try{
                $consulta = "SELECT * FROM users limit :limit offset :offset";
                $basedatos = new conexion_db;
                $consulta_users = $basedatos->accesoDB()->prepare($consulta);
                $consulta_users->bindValue(':limit', $limit, PDO::PARAM_INT);
                $consulta_users->bindValue(':offset', $offset, PDO::PARAM_INT);
                $consulta_users->execute();
                $resultado = $consulta_users->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;

            }catch(PDOexception $e){
                echo 'Se ha producido un error' . $e->getMessage();
            }
        }

        // Contamos el número de usuarios obtenidos
        function contarUsuarios() {
            try {
                $consulta = "SELECT COUNT(*) as total FROM users";
                $basedatos = new conexion_db;
                $consulta_users = $basedatos->accesoDB()->prepare($consulta);
                $consulta_users->execute();
                $resultado = $consulta_users->fetch(PDO::FETCH_ASSOC);
                return $resultado['total'];
            } catch(PDOexception $e) {
                echo 'Se ha producido un error: ' . $e->getMessage();
                return 0;
            }
        }

?>