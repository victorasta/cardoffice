var tabla_roles;
$(document).ready(function() {

    $(".btn-actualizar-tabla-roles").click(function() {

        actualizar_tabla_roles();
    });

    $(".btn-exportar-tabla-pdf").click(function() {
        exportar_tabla_pdf();
    });

    actualizar_tabla_roles();
})


function actualizar_tabla_roles() {


    ajax({
        data: {},
        url: url + 'reportes/consultar_roles',
        prev: function() {
            $(".btn-actualizar-tabla-roles").prop('disabled', 'disabled');
            $(".btn-actualizar-tabla-roles-icon").removeClass('fa-redo-alt');
            $(".btn-actualizar-tabla-roles-icon").addClass('spinner-border spinner-border-sm');
        },
        complete: function() {
            $(".btn-actualizar-tabla-roles").removeAttr('disabled');
            $(".btn-actualizar-tabla-roles-icon").removeClass('spinner-border spinner-border-sm');
            $(".btn-actualizar-tabla-roles-icon").addClass('fa-redo-alt');
        },
        success: function(json) {
            if (json.error) {
                Toast.fire({ type: 'error', title: `No se pudo actualizar la tabla de roles. ${json.error}` });
            } else {
                if ($.fn.dataTable.isDataTable('#tabla_roles')) {
                    tabla_roles.destroy();
                }
                tabla_roles = $("#tabla_roles").DataTable({
                    "data": json.roles,
                    "autoWidth": true,
                    "columns": [{
                            "data": "ID_ROL",
                            "title": "ID"
                        },
                        {
                            "data": "NOMBRE_ROL",
                            "title": "ROL"
                        }
                    ]
                });
            }
        },
        error: function(xhr, status) {
            console.log(xhr.responseText);
        }
    })
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////


function get_tabla_roles_HTML() {
    var tabla = document.getElementById('tabla_roles');
    return tabla.innerHTML;
}

function exportar_tabla_pdf() {
    ajax({

        data: { data: 'prueba' },
        url: url + 'exportar_tabla_pdf',
        prev: function() {
            // $(".btn-exportar-tabla-pdf").prop('disabled', 'disabled');
            // $(".btn-exportar-tabla-pdf-icon").removeClass('fa-file-pdf');
            // $(".btn-exportar-tabla-pdf-icon").addClass('spinner-border spinner-border-sm');
        },
        complete: function() {
            // $(".btn-exportar-tabla-pdf").removeAttr('disabled');
            // $(".btn-exportar-tabla-pdf-icon").removeClass('spinner-border spinner-border-sm');
            // $(".btn-exportar-tabla-pdf-icon").addClass('fa-file-pdf');
        },
        success: function() {
            console.log("exito");
        },
        error: function(xhr, status, err) {
            console.log('XHR: ' + xhr.statusText);
            console.log('Status: ' + status);
            console.log('Error: ' + err);
            console.log("Nel perro");
        }

        // data: { 'tabla': "Prueba de parseo" },
        // type: "POST",
        // url: url + 'reportes/exportar_tabla_pdf',
        // prev: function() {
        //     $(".btn-exportar-tabla-pdf").prop('disabled', 'disabled');
        //     $(".btn-exportar-tabla-pdf-icon").removeClass('fa-file-pdf');
        //     $(".btn-exportar-tabla-pdf-icon").addClass('spinner-border spinner-border-sm');
        // },
        // complete: function() {
        //     $(".btn-exportar-tabla-pdf").removeAttr('disabled');
        //     $(".btn-exportar-tabla-pdf-icon").removeClass('spinner-border spinner-border-sm');
        //     $(".btn-exportar-tabla-pdf-icon").addClass('fa-file-pdf');
        // },
        // success: function(json) {
        //     if (json.error) {
        //         Toast.fire({ type: 'error', title: `No se pudo exportar la tabla. ${json.error}` });
        //     } else {
        //         Toast.fire({ type: 'success', title: `Exportado correctamente` });
        //     }
        // },
        // error: function(xhr, status, err) {
        //     console.log(xhr.statusText);
        //     console.log(status);
        //     console.log(err);
        // }
    })
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////

$("form").on('reset', function(e) {
    $("#fm-marca input[type='hidden']").val('');
});