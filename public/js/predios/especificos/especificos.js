var cp=$("#cp");
var cpbuscar=$("#cp-buscar");

$(document).on("ready", function(){

	cpbuscar.on("click", function(event){
			buscarcp();
	});
});

function buscarcp(){
	var divAsentamientos=$("#asentamientos");
	var urlbuscar = '/datos/buscar-cp';
	var datosbuscar = {
		cp: cp.val()
	};
	var jsonbuscar = funciones.forms(urlbuscar, 'GET', datosbuscar);

	divAsentamientos.empty();
	if(jsonbuscar.bandera){

		var divColMd=$('<div class="col-md-4">');
		var divFormGroup=$('<div class="form-group">');
		var labelColonia=$('<label>Colonia</label>');
		var selectColonia=$('<select class="form-control" name="idSepomex"/>');

		$.each(jsonbuscar.data, function(k, v){
			selectColonia.append('<option value="'+v.id+'">'+v.asentamiento+'</option>');
		});

		divFormGroup.append(labelColonia).append(selectColonia);
		divColMd.append(divFormGroup);
		divAsentamientos.append(divColMd);

	}
}