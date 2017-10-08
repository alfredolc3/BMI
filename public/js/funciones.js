var funciones = new function () {

    var that = this;

    /*
     * DEFINICIÓN DE ENCABEZADO PARA ENVÍO DE AJAX
     * EN CONJUNTO CON TOKEN DE LARAVEL V5.1
     * */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    
    this.usuario_rol = $("meta[name=usuario_rol]").attr('content');

    /*
     * FUNCIÓN PARA BLOQUEO DE PANTALLA O SECCIÓN
     * */
    this.loader = function (selector) {

        var opciones = {
            message: 'Por favor, espera.',
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }
        };

        if (typeof selector === "undefined") {
            $.blockUI(opciones);
        } else {
            $(selector).block(opciones);
        }
    };

    /*
     * FUNCIÓN PARA REMOVER BLOQUEO DE PANTALLA O SECCIÓN
     * */
    this.removeLoader = function (selector) {
        if (typeof selector === "undefined") {
            $.unblockUI();
        } else {
            $(selector).unblock();
        }
    };

    /*
     * FUNCIÓN PARA REALIZAR NOTIFICACIONES
     * */
    this.notificaciones = function (tipo, titulo, texto) {

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        toastr[tipo](texto, titulo);
    };

    /*
     * FUNCIÓN PARA ENVÍO DE INFORMACIÓN SIMPLE
     * */
    this.forms = function (url, metodo, datos) {
        if (!metodo) {
            metodo = 'GET';
        }
        if (!datos) {
            datos = {};
        }
        var bandera = true;
        var data = {};
        var peticion = $.ajax({
            url: url,
            type: metodo,
            data: datos,
            async: false
        });

        peticion.done(function (response, textStatus, xhr) {
            if (xhr.status === 204) {
                that.correcto();
            } else {
                if (typeof response.data !== "undefined") {
                    data = response.data;
                } else {
                    that.correcto(response.mensaje);
                }
            }
        }).fail(function (response) {
            if (response.status === 422) {
                var errores = $('<ul />');
                $.each(response.responseJSON.mensaje, function (k, v) {
                    errores.append('<li>' + v + '</li>');
                });
                that.errores(errores);
            } else {
                var mensaje = "";
                if (response.status >= 500) {
                    mensaje = "Error en la aplicación.";
                } else if (response.status === 404) {
                    mensaje = "Recurso no encontrado.";
                } else if (response.status === 401) {
                    mensaje = "Acceso denegado.";
                } else {
                    mensaje = response.responseJSON.mensaje;
                }
                that.errores(mensaje);
            }
            bandera = false;
        });

        return {bandera: bandera, data: data};
    };

    /*
     * FUNCIÓN PARA ENVÍO DE INFORMACIÓN CON ARCHIVOS INCLUIDOS
     * */
    this.formsArchivos = function (url, metodo, datos) {
        if (!metodo) {
            metodo = 'GET';
        }

        if (!datos) {
            datos = {};
        }

        var bandera = true;
        var data = {};
        var peticion = $.ajax({
            url: url,
            type: metodo,
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            async: false
        });

        peticion.done(function (response, textStatus, xhr) {
            if (xhr.status === 204) {
                that.correcto();
            } else {
                if (typeof response.data !== "undefined") {
                    data = response.data;
                } else {
                    that.correcto(response.mensaje);
                }
            }
        }).fail(function (response) {
            if (response.status === 422) {
                var errores = $('<ul />');
                $.each(response.responseJSON.mensaje, function (k, v) {
                    errores.append('<li>' + v + '</li>');
                });
                that.errores(errores);
            } else {
                var mensaje = "";
                if (response.status >= 500) {
                    mensaje = "Error en la aplicación.";
                } else if (response.status === 404) {
                    mensaje = "Recurso no encontrado.";
                } else if (response.status === 401) {
                    mensaje = "Acceso denegado.";
                } else {
                    mensaje = response.responseJSON.mensaje;
                }
                that.errores(mensaje);
            }
            bandera = false;
        });
        return {bandera: bandera, data: data};
    };

    /*
     * FUNCIÓN PARA GENERAR NOTIFICACIÓN ERROR O TÉRMINO ERRÓNEO DEL PROCESO
     * */
    this.errores = function (mensaje) {
        funciones.notificaciones("error", 'Error', mensaje);
    };

    /*
     * FUNCIÓN PARA GENERAR NOTIFICACIÓN CORRECTA O TÉRMINO SATISFACTORIO DEL PROCESO
     * */
    this.correcto = function (mensaje) {
        funciones.notificaciones("success", 'Correcto', mensaje);
    };

    this.modal = function () {
        var modal = $('<div class="modal fade" role="dialog"/>');
        var modalDialog = $('<div class="modal-dialog modal-lg" role="document" />');
        var modalContent = $('<div class="modal-content"/>');
        var modalHeader = $('<div class="modal-header"/>');
        var botonCerrar = $('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
        var h4ModalTitle = $('<h4 class="modal-title"/>');
        modalHeader.append(botonCerrar).append(h4ModalTitle);
        var modalBody = $('<div class="modal-body"/>');
        var modalFooter = $('<div class="modal-footer"/>');
        modalContent.append(modalHeader).append(modalBody).append(modalFooter);
        modalDialog.append(modalContent);
        modal.append(modalDialog);

        return modal;
    };
};
