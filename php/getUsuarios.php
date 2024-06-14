<?php
// OBTENEMOS TODOS LOS USUARIOS

        include "conexion.php";

        // Para la paginación declaramos el limite de registros y el desplazamiento
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $limit;

        // Obtenemos todos los usuarios con límite de datos obtenidos y desplazamiento
            try{
                $consulta = "SELECT * FROM users LIMIT :limit OFFSET :offset";
                $basedatos = new conexion_db;
                $consulta_users = $basedatos->accesoDB()->prepare($consulta);
                $consulta_users->bindParam(':limit', $limit, PDO::PARAM_INT);
                $consulta_users->bindParam(':offset', $offset, PDO::PARAM_INT);
                $consulta_users->execute();
                $resultado = $consulta_users->fetchAll(PDO::FETCH_ASSOC);

                // Realizamos el conteo de usuarios totales para hacer la paginación
                $consulta_total = "SELECT COUNT(*) as total FROM users";
                $consulta_total_users = $basedatos->accesoDB()->prepare($consulta_total);
                $consulta_total_users->execute();
                $totalUsuarios = $consulta_total_users->fetch(PDO::FETCH_ASSOC)['total'];

                echo json_encode([
                    'usuarios' => $resultado,
                    'totalUsuarios' => $totalUsuarios
                ]);

            }catch(PDOexception $e){
                echo 'Se ha producido un error' . $e->getMessage();
            }

?>