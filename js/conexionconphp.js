// ARCHIVO CON EL JQUERY Y EL AJAX NECESARIOS PARA CONECTAR JAVASCRIPT CON PHP

$(document).ready(function() {

    // Botón para mostrar modal para añadir usuarios
    $('#addUser' ).on( "click", function() {
        $("#addUserModal").modal("show");
    });

    // Botón volver de search.php
    $('#volver').on( "click", function() {
        location.href ="index.php";
    });

    // Inyectamos los datos del usuario en el modal cuando clickamos en el botón "Modificar usuario" de index.php
    $(document).on("click", 'button[data-edit]', function() {
        var id = this.dataset.edit; // Obtenemos el id del usuario que queremos modificar

        $.ajax({
            url: `./php/getUserById.php?id=${id}`,
            type: "GET",
            dataType: "json",
            
            success: function(response) {

                /*Insertamos los valores en los input de la ventana modal*/
                $("#id_edit_user").val(response[0].id);
                $("#edit_dni_user").val(response[0].dni);
                $("#edit_nombre_user").val(response[0].nombre_usuario);
                $("#edit_fecha_user").val(response[0].fecha_nacimiento);
                $("#edit_telefono_user").val(response[0].telefono);
                $("#edit_email_user").val(response[0].email);
                // Muestra la ventana modal para editar usuario (ver ventanas_modales.php)
                $("#editUserModal").modal("show");
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Envía el error si lo hay
            }
        });
        
    })

    
});