var tabla_marcas;
$(document).ready(function() {

    $(".btn-actualizar-tabla-marcas").click(function() {
        actualizar_tabla_marcas();
    });
    $(document).on('click', '.editar_marca', function() {
        $(this).off('click');
        ajax({
            data: {
                'id_marca': $(this).data('id-marca')
            },
            url: url + 'marca/consultar_marca',
            prev: function() {
                $('.editar_marca').prop('disabled', 'disabled');
            },
            complete: function() {
                $('.editar_marca').removeAttr('disabled');
            },
            success: function(json) {
                if (json.error) {
                    Toast.fire({
                        type: 'error',
                        title: `No se pudo consultar la marca. ${json.error}`
                    });
                } else {
                    $("#marca_id_marca").val(json.ID_MARCA);
                    $("#marca_nombre_marca").val(json.NOMBRE_MARCA);
                    $("#marca_estado_marca").prop('checked', (json.ESTADO_MARCA == 'A'));
                }
            },
            error: function(xhr, status) {
                console.log(xhr.responseText);
            }
        })
    });
    $(document).on('click', '.eliminar_marca', function() {
        $(this).off('click');
        Swal.fire({
            type: 'warning',
            title: 'Eliminar marca',
            text: `¿Está seguro de eliminar esta marca (${$(this).data('id-marca')})?`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d36',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.value) {
                ajax({
                    data: {
                        'id_marca': $(this).data('id-marca')
                    },
                    url: url + 'marca/eliminar_marca',
                    prev: function() {
                        $('.eliminar_marca').prop('disabled', 'disabled');
                    },
                    complete: function() {
                        $('.eliminar_marca').removeAttr('disabled');
                    },
                    success: function(json) {
                        var result;
                        if (json.error) {
                            result = { type: 'error', title: `No se pudo eliminar la marca. ${json.error}` };
                        } else {
                            result = { type: 'success', title: `Marca eliminada correctamente` };
                        }
                        Toast.fire(result);
                        actualizar_tabla_marcas();
                    },
                    error: function(xhr, status) {
                        console.log(xhr.responseText);
                    }
                })
            }
        });
    });
    actualizar_tabla_marcas();
})
$("#guardar_marca").click(function(evt) {
    $("#guardar_marca").off('click');
    $("#fm-marca").validetta({
        display: 'bubble',
        bubblePosition: 'bottom',
        onValid: function(e) {
            e.preventDefault();
            ajax({
                data: {
                    'id_marca': $("#marca_id_marca").val(),
                    'nombre_marca': $("#marca_nombre_marca").val(),
                    'estado_marca': $("#marca_estado_marca").prop('checked') ? 'A' : 'I'
                },
                url: url + 'marca/guardar_marca',
                prev: function() {
                    $("#guardar_marca").prop('disabled', 'disabled');
                    $("#guardar-marca-icon").removeClass('fa-save');
                    $("#guardar-marca-icon").addClass('spinner-border spinner-border-sm');
                },
                success: function(json) {
                    var result;
                    if (json.error) {
                        result = { type: 'error', title: `No se pudo guardar la marca. ${json.error}` };
                    } else {
                        result = { type: 'success', title: `Marca guardada correctamente` };
                        $("#fm-marca").trigger('reset');
                        actualizar_tabla_marcas();
                    }
                    Toast.fire(result);
                },
                error: function(xhr, status) {
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $("#guardar_marca").removeAttr('disabled');
                    $("#guardar-marca-icon").removeClass('spinner-border spinner-border-sm');
                    $("#guardar-marca-icon").addClass('fa-save');
                }
            })
        },
        onError: function(e) {}
    }, {
        required: 'No debe quedar vacío'
    });
});

function actualizar_tabla_marcas() {
    ajax({
        data: {},
        url: url + 'marca/consultar_marcas',
        prev: function() {
            $(".btn-actualizar-tabla-marcas").prop('disabled', 'disabled');
            $(".btn-actualizar-tabla-marcas-icon").removeClass('fa-redo-alt');
            $(".btn-actualizar-tabla-marcas-icon").addClass('spinner-border spinner-border-sm');
        },
        complete: function() {
            $(".btn-actualizar-tabla-marcas").removeAttr('disabled');
            $(".btn-actualizar-tabla-marcas-icon").removeClass('spinner-border spinner-border-sm');
            $(".btn-actualizar-tabla-marcas-icon").addClass('fa-redo-alt');
        },
        success: function(json) {
            if (json.error) {
                Toast.fire({ type: 'error', title: `No se pudo actualizar la tabla de marcas. ${json.error}` });
            } else {
                if ($.fn.dataTable.isDataTable('#tabla_marcas')) {
                    tabla_marcas.destroy();
                }
                tabla_marcas = $("#tabla_marcas").DataTable({
                    "data": json.marcas,
                    "autoWidth": true,
                    "columns": [{
                            "data": "NOMBRE_MARCA",
                            "title": "Nombre"
                        },
                        {
                            "data": "ESTADO_MARCA",
                            "title": "Estado",
                            "render": function(data, type, row, meta) {
                                return row.ESTADO_MARCA == 'A' ?
                                    '<p class="text-success">ACTIVO<p>' :
                                    '<p class="text-danger">NO ACTIVO<p>';
                            }
                        },
                        {
                            "title": "Acciones",
                            "render": function(data, type, row, meta) {
                                return (json.permisos.UPDATE_PRIV == 'Y' ?
                                        '<span title="Editar"><button type="button" class="btn btn-info editar_marca" data-id-marca="' + row.ID_MARCA + '"><i class="fas fa-edit"></i></button></span>' : '') +
                                    (json.permisos.DELETE_PRIV == 'Y' ?
                                        '<span title="Eliminar"><button type="button" class="btn btn-danger eliminar_marca" data-id-marca="' + row.ID_MARCA + '"><i class="fas fa-edit"></i></button></span>' : '');
                            }
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
$("form").on('reset', function(e) {
    $("#fm-marca input[type='hidden']").val('');
});