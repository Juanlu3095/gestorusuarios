<?php

// FILTRO POR BÚSQUEDA

        include "conexion.php";

        // Para la paginación declaramos el limite de registros y el desplazamiento
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $limit;

        
            try{
                $consulta = "SELECT * FROM users where nombre_usuario LIKE :keyword LIMIT :limit OFFSET :offset";
                $keyword = '%' . $_GET["keyword"] . '%';
                $basedatos = new conexion_db;
                $consulta_keyword = $basedatos->accesoDB()->prepare($consulta);
                $consulta_keyword->bindParam(':keyword', $keyword, PDO::PARAM_STR);
                $consulta_keyword->bindParam(':limit', $limit, PDO::PARAM_INT);
                $consulta_keyword->bindParam(':offset', $offset, PDO::PARAM_INT);
                
                $consulta_keyword->execute();
                $resultado = $consulta_keyword->fetchAll(PDO::FETCH_ASSOC);

                // Realizamos el conteo de usuarios totales para hacer la paginación
                $consulta_total = "SELECT COUNT(*) as total FROM users where nombre_usuario LIKE ?";
                $consulta_total_users = $basedatos->accesoDB()->prepare($consulta_total);
                $consulta_total_users->execute([$keyword]);
                $totalUsuariosByKeyword = $consulta_total_users->fetch(PDO::FETCH_ASSOC)['total'];
                
                echo json_encode([
                    'usuarios' => $resultado,
                    'totalUsuarios' => $totalUsuariosByKeyword
                ]);

            }catch(PDOexception $e){
                echo 'Se ha producido un error' . $e->getMessage();
            }

?>