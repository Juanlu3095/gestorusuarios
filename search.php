<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles-principal.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    
    <title>Resultados de la búsqueda</title>
</head>
<body>

<?php
include 'ventanamodal/ventanas_modales.php';
?>

<div class="toolbar row">

    <div class="search-container col-6">
        <form class="d-flex" role="search" id="searchbykeyword">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="keyword" id="keyword">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
    </div>

    <div class="button-container col">
        <button type="button" id="volver" class="btn btn-primary">Volver</button>
    </div>

</div>

<table class="table mt-3" id="tablaUsers">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">DNI</th>
      <th scope="col">Nombre completo</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Email</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="cuerpotabla">
        <tr>
          <td>No hay usuarios para mostrar.</td>
        </tr>
  </tbody>
</table>

<!-- Botones de la paginación -->
<nav>
  <ul class="pagination" id="paginacion"></ul>
</nav>

<script>

$(document).ready(function(){
    
    var keyword = new URLSearchParams(window.location.search).get('keyword');

    var limit = 10;
    var currentPage = 1;
    
    if(keyword) {
    function cargarUsuariosByKeyword(page) {
    $.ajax({
            url: `php/getUsersByKeyword.php`,
            type: "GET",
            data: { 
                keyword: keyword,
                limit: limit,
                page: page
            },
            dataType: "json",
            
            success: function(response) {
                console.log(response);
                $('#cuerpotabla').empty();
                
                if(response.usuarios.length > 0){
                   
                response.usuarios.forEach(function(usuario){
                    var datosUsuarios = '<tr>' +
                                '<td>' + usuario.id + '</td>' +
                                '<td>' + usuario.dni + '</td>' +
                                '<td>' + usuario.nombre_usuario + '</td>' +
                                '<td>' + usuario.fecha_nacimiento + '</td>' +
                                '<td>' + usuario.telefono + '</td>' +
                                '<td>' + usuario.email + '</td>' +
                                '<td><button type="button" class="btn btn-primary" id="editUser" data-edit="' + usuario.id + '">Modificar usuario</button></td>' +
                                '</tr>';
                                $('#cuerpotabla').append(datosUsuarios);
                    
                });
                updatePagination(response.totalUsuarios, page);
            } else {
                $('#cuerpotabla').append('<tr><td>No hay usuarios para mostrar.</td></tr>');
            }
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Envía el error si lo hay
            }
        });
    }
    }

    function updatePagination(totalUsuarios, currentPage) {
    // Obtenemos el número total de páginas, usando Math.ceil devolvemos el entero resultante de la división
    var totalPages = Math.ceil(totalUsuarios / limit);
    $('#paginacion').empty();

      // Iteración con la que creamos los elementos de la paginación y asignamos la clase 'active' si es la página actual
      for (var i = 1; i <= totalPages; i++) {
        var pageItem = '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">' + 
          '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
        $('#paginacion').append(pageItem);
      }
  }

  // Cargamos los datos de la base de datos al clickar en los botones de la paginación
  $(document).on('click', '.page-link', function(e) {
      e.preventDefault();
      var page = $(this).data('page'); // Obtenemos el número de página en el que se hace click y extraemos el valor de data-page
      if (page && page !== currentPage) { // Si la página pinchada no corresponde con la actual, cargamos el nuevo contenido
          currentPage = page;
          cargarUsuariosByKeyword(currentPage);
      }
  });

  cargarUsuariosByKeyword(currentPage);
})


</script>
<script src="js/conexionconphp.js"></script>
</body>
</html>