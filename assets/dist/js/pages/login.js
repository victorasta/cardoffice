const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});
$(document).ready(function() {
    $("#send").click(function(evt) {
        $("#fm-login").validetta({
            display: 'bubble',
            bubblePosition: 'bottom',
            onValid: function(e) {
                e.preventDefault();
                ajax({
                    data: {
                        'user': $("#user").val(),
                        'password': $("#password").val()
                    },
                    url: url + '/usuario/iniciar_sesion',
                    prev: function() {
                        $("#send-icon").removeClass('fa-arrow-circle-right');
                        $("#send-icon").addClass('spinner-border spinner-border-sm');
                    },
                    complete: function() {
                        $("#send-icon").removeClass('spinner-border spinner-border-sm');
                        $("#send-icon").addClass('fa-arrow-circle-right');
                    },
                    success: function(json) {
                        if (json.err) {
                            Toast.fire({
                                type: 'error',
                                title: json.err
                            });
                            $('#password').val('');
                        } else {
                            location.href = 'http://localhost/asoccmaj/'
                        }
                    },
                    error: function(xhr, status) {
                        alert(xhr.responseText);
                    }
                })
            },
            onError: function(e) {}
        }, { required: 'No debe quedar vacío' });
    });
})