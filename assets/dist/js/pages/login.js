$(document).ready(function() {
    $("#send").click(function(evt) {
        $("#send").off('click');
        $("#fm-login").validetta({
            display: 'bubble',
            bubblePosition: 'bottom',
            onValid: function(e) {
                e.preventDefault();
                ajax({
                    data: {
                        'correo': $("#correo").val(),
                        'password': $("#password").val()
                    },
                    url: url + 'usuario/login',
                    prev: function() {
                        $("#send-icon").removeClass('fa-arrow-circle-right');
                        $("#send-icon").addClass('spinner-border spinner-border-sm');
                    },
                    success: function(json) {
                        if (json.error) {
                            Toast.fire({
                                type: 'error',
                                title: json.error
                            });
                            $('#password').val('');
                        } else {
                            location.href = url;
                        }
                    },
                    error: function(xhr, status) {
                        alert(xhr.responseText);
                    },
                    complete: function() {
                        $("#send-icon").removeClass('spinner-border spinner-border-sm');
                        $("#send-icon").addClass('fa-arrow-circle-right');
                    },
                })
            },
            onError: function(e) {}
        }, {
            required: 'No debe quedar vacío',
            email: 'Debe proporcionar una dirección de correo electrónico válida'
        });
    });
})