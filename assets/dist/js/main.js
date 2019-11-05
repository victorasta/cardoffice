function ajax(info) {
    info.prev();
    $.ajax({
        type: 'post',
        cache: false,
        url: info.url,
        data: info.data,
        dataType: 'json',
        success: function(json) {
            info.success(json);
        },
        error: function(xhr, status) {
            info.error(xhr, status);
        },
        complete: function(xhr, status) {
            info.complete(xhr, status);
        }
    });
}
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});