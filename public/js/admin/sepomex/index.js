var api;
$(document).on("ready", function(){

	var formAsentamiento = $("#formAsentamiento");
	formAsentamiento.on("submit", function(event){
		event.preventDefault();

		var urlAsentamientos = "/admin/sepomex/json";
		//var datosAsentamientos = formAsentamiento.serialize()+'&datatable=true';
		//var jsonAsentamientos = funciones.forms(urlAsentamientos, 'GET', datosAsentamientos);
		//if(jsonAsentamientos.bandera){

			var divResultados = $("#resultados");
            divResultados.empty().append('<hr />');

            var divBox = $('<div class="box box-info" />');
            var divBoxHeader = $('<div class="box-header with-border" />');
            var h3BoxTitle = $('<h3 class="bot-title">Resultados</h3>');
            divBoxHeader.append(h3BoxTitle);
            var divBoxBody = $('<div class="box-body" />');

            var tablaResultados = $('<table class="table table-hover table-striped" />');
            var tHeadResultados = $('<thead />');
            var trHeadResultados = $('<tr />');
            trHeadResultados.append('<th>ID</th>');
            trHeadResultados.append('<th>Estado</th>');
            trHeadResultados.append('<th>Municipio</th>');
            trHeadResultados.append('<th>Ciudad</th>');
            trHeadResultados.append('<th>Tipos de predio</th>');
            trHeadResultados.append('<th>CP</th>');
            trHeadResultados.append('<th>Asentamiento</th>');
            trHeadResultados.append('<th>Acción</th>');
            tHeadResultados.append(trHeadResultados);
            tablaResultados.append(tHeadResultados);
            divBoxBody.append(tablaResultados);

            tablaResultados.dataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                dom: 'T<"clear">lfrtip',
                "ajax": {
                    url: urlAsentamientos,
                    type: 'GET',
                    data: function (d) {
                        d.estado = $("#estado").val();
                        d.municipio = $("#municipio").val();
                        d.ciudad = $("#ciudad").val();
                        d.tipoPredio = $("#tpredio").val();
                        d.cp = $("#cp").val();
                        d.asentamiento = $("#asentamiento").val();
                        d.tipoAsentamiento = $("#tasentamiento").val();
                        d.datatable = true;
                    }
                },
                "columns": [
                	{data: 'id', name: 'id'},
                    {data: 'estado', name: 'estado'},
                    {data: 'municipio', name: 'municipio'},
                    {data: 'ciudad', name: 'ciudad'},
                    {data: 'tipoPredio', name: 'tipoPredio'},
                    {data: 'cp', name: 'cp'},
                    {data: 'asentamiento', name: 'asentamiento'},
                    //{data: 'tipoAsentamiento', name: 'tipoAsentamiento'},
                    {data: 'opciones', name: 'opciones', searchable: false, orderable: false}
                ],
                order: [0, 'desc'],
                drawCallback: function () {
                    api = this.api();
                },
                createdRow: function (row, data, index) {
                    var botonEditar = $('<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar emisor"><i class="fa fa-edit"></i></button>');
                    botonEditar.on("click", function () {
                        funciones.loader();
                        window.setTimeout(function () {

                            var modalEmisor = funciones.modal();
                            var modalTitleEmisor = modalEmisor.find(".modal-title");
                            var modalBodyEmisor = modalEmisor.find(".modal-body");
                            var modalFooterEmisor = modalEmisor.find(".modal-footer");

                            modalTitleEmisor.append("Editar emisor");

                            var formEmisor = $('<form />');

                            var divFormGroupRfc = $('<div class="form-group" />');
                            var labelRfc = $('<label class="control-label">RFC</label>');
                            var inputRfc = $('<input name="rfc" class="form-control"/>');
                            inputRfc.val(data.rfc);
                            divFormGroupRfc.append(labelRfc).append(inputRfc);
                            formEmisor.append(divFormGroupRfc);

                            var divFormGroupCer = $('<div class="form-group" />');
                            var labelCer = $('<label class="control-label">Cer</label>');
                            var inputCer = $('<input name="cer" type="file"/>');
                            divFormGroupCer.append(labelCer).append(inputCer);
                            formEmisor.append(divFormGroupCer);

                            var divFormGroupKey = $('<div class="form-group" />');
                            var labelKey = $('<label class="control-label">Key</label>');
                            var inputKey = $('<input name="key" type="file"/>');
                            divFormGroupKey.append(labelKey).append(inputKey);
                            formEmisor.append(divFormGroupKey);

                            var divFormGroupKey = $('<div class="form-group" />');
                            var labelKey = $('<label class="control-label">Contraseña Certificado</label>');
                            var inputKey = $('<input name="password_certificado" class="form-control"/>');
                            inputKey.val(data.password_certificado);
                            divFormGroupKey.append(labelKey).append(inputKey);
                            formEmisor.append(divFormGroupKey);

                            var divFormGroupRegimen = $('<div class="form-group" />');
                            var labelRegimen = $('<label class="control-label">Régimen fiscal</label>');
                            var selectRegimen = $('<select name="regimen" class="form-control" />');
                            var urlRegimenes = "/catalogos/regimenes-fiscales/json";
                            var jsonRegimenes = funciones.forms(urlRegimenes);
                            if (jsonRegimenes.bandera) {
                                $.each(jsonRegimenes.data.data, function (k, v) {
                                    selectRegimen.append('<option value="' + v.clave + '">' + v.clave + " / " + v.descripcion + '</option>');
                                });
                            }
                            selectRegimen.val(data.clave);
                            divFormGroupRegimen.append(labelRegimen).append(selectRegimen);
                            formEmisor.append(divFormGroupRegimen);

                            modalBodyEmisor.append(formEmisor);

                            var botonGuardar = $('<button type="button" class="btn btn-success">Guardar</button>');
                            botonGuardar.on("click", function () {
                                funciones.loader(modalEmisor.find(".modal-content"));
                                window.setTimeout(function () {
                                    var urlEditarEmisor = "/catalogos/emisores/" + data.id;
                                    var datosEditarEmisor = formEmisor.serialize();
                                    var jsonEditarEmisor = funciones.forms(urlEditarEmisor, datosEditarEmisor, 'PUT');
                                    if (jsonEditarEmisor.bandera) {
                                        funciones.correcto(jsonEditarEmisor.data.mensaje);
                                        modalEmisor.modal("hide");
                                        api.draw();
                                    }
                                    funciones.removeLoader(modalEmisor.find(".modal-content"));
                                }, 200);
                            });
                            modalFooterEmisor.append(botonGuardar);

                            modalEmisor.modal().on("hidden.bs.modal", function () {
                                $(this).remove();
                            });
                            funciones.removeLoader();
                        }, 200);
                    }).tooltip();

                    $('td', row).eq(7).append(botonEditar);
                }
            });

            divBox.append(divBoxBody);
            divResultados.append(divBox);

		//}
	});

});