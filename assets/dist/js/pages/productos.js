var tabla_categorias;
$(document).ready(function() {

    $(".btn-actualizar-tabla-categorias").click(function() {
        actualizar_tabla_categorias();
    });
    $(document).on('click', '.editar_categoria', function() {
        $(this).off('click');
        ajax({
            data: {
                'id_categoria': $(this).data('id-categoria')
            },
            url: url + 'categoria/consultar_categoria',
            prev: function() {
                $('.editar_categoria').prop('disabled', 'disabled');
            },
            complete: function() {
                $('.editar_categoria').removeAttr('disabled');
            },
            success: function(json) {
                if (json.error) {
                    Toast.fire({
                        type: 'error',
                        title: `No se pudo consultar la categoría. ${json.error}`
                    });
                } else {
                    $("#categoria_id_categoria").val(json.ID_CATEGORIA);
                    $("#categoria_nombre_categoria").val(json.NOMBRE_CATEGORIA);
                    $("#categoria_estado_categoria").prop('checked', (json.ESTADO_CATEGORIA == 'A'));
                }
            },
            error: function(xhr, status) {
                console.log(xhr.responseText);
            }
        })
    });
    $(document).on('click', '.eliminar_categoria', function() {
        $(this).off('click');
        Swal.fire({
            type: 'warning',
            title: 'Eliminar categoría',
            text: `¿Está seguro de eliminar esta categoría (${$(this).data('id-categoria')})?`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d36',
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            if (result.value) {
                ajax({
                    data: {
                        'id_categoria': $(this).data('id-categoria')
                    },
                    url: url + 'categoria/eliminar_categoria',
                    prev: function() {
                        $('.eliminar_categoria').prop('disabled', 'disabled');
                    },
                    complete: function() {
                        $('.eliminar_categoria').removeAttr('disabled');
                    },
                    success: function(json) {
                        var result;
                        if (json.error) {
                            result = { type: 'error', title: `No se pudo eliminar la categoría. ${json.error}` };
                        } else {
                            result = { type: 'success', title: `Categoría eliminada correctamente` };
                        }
                        Toast.fire(result);
                        actualizar_tabla_categorias();
                    },
                    error: function(xhr, status) {
                        console.log(xhr.responseText);
                    }
                })
            }
        });
    });
    actualizar_tabla_categorias();
})
$("#producto_img_producto").on('change', function() {
    if (this.files.length < 1 || this.files.length > 1 ||
        (this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png')) {
        Toast.fire({ type: 'error', title: `Debe proporcionar una imagen. Formatos admitidos: .JPG, .JPEG, .PNG ` });
        $(this).val('');
        return false;
    }
});
$("#guardar_producto").click(function(evt) {
    $("#guardar_producto").off('click');
    $("#fm-producto").validetta({
        display: 'bubble',
        bubblePosition: 'bottom',
        onValid: function(e) {
            e.preventDefault();
            var data = new FormData();
            data.append('img_producto', $("#producto_img_producto")[0].files[0]);
            console.log(data);

        },
        onError: function(e) {}
    }, {
        required: 'No debe quedar vacío'
    });
});

function actualizar_tabla_categorias() {
    ajax({
        data: {},
        url: url + 'categoria/consultar_categorias',
        prev: function() {
            $(".btn-actualizar-tabla-categorias").prop('disabled', 'disabled');
            $(".btn-actualizar-tabla-categorias-icon").removeClass('fa-redo-alt');
            $(".btn-actualizar-tabla-categorias-icon").addClass('spinner-border spinner-border-sm');
        },
        complete: function() {
            $(".btn-actualizar-tabla-categorias").removeAttr('disabled');
            $(".btn-actualizar-tabla-categorias-icon").removeClass('spinner-border spinner-border-sm');
            $(".btn-actualizar-tabla-categorias-icon").addClass('fa-redo-alt');
        },
        success: function(json) {
            if (json.error) {
                Toast.fire({ type: 'error', title: `
                            No se pudo actualizar la tabla de categorías.$ { json.error } ` });
            } else {
                if ($.fn.dataTable.isDataTable('#tabla_categorias')) {
                    tabla_categorias.destroy();
                }
                tabla_categorias = $("#tabla_categorias").DataTable({
                    "data": json.categorias,
                    "autoWidth": true,
                    "columns": [{
                            "data": "NOMBRE_CATEGORIA",
                            "title": "Nombre"
                        },
                        {
                            "data": "ESTADO_CATEGORIA",
                            "title": "Estado",
                            "render": function(data, type, row, meta) {
                                return row.ESTADO_CATEGORIA == 'A' ?
                                    '<p class="text-success">ACTIVO<p>' :
                                    '<p class="text-danger">NO ACTIVO<p>';
                            }
                        },
                        {
                            "title": "Acciones",
                            "render": function(data, type, row, meta) {
                                return (json.permisos.UPDATE_PRIV == 'Y' ?
                                        '<span title="Editar"><button type="button" class="btn btn-info editar_categoria" data-id-categoria="' + row.ID_CATEGORIA + '"><i class="fas fa-edit"></i></button></span>' : '') +
                                    (json.permisos.DELETE_PRIV == 'Y' ?
                                        '<span title="Eliminar"><button type="button" class="btn btn-danger eliminar_categoria" data-id-categoria="' + row.ID_CATEGORIA + '"><i class="fas fa-edit"></i></button></span>' : '');
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
    $("#fm-categoria input[type='hidden']").val('');
});