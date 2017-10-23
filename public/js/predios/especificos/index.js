var cp = $("#cp");
var cpbuscar = $("#cp-buscar");
var marcadores = [];
var latitud = $("#latitud");
var longitud = $("#longitud");
var altitud = $("#altitud");

$(document).on("ready", function () {

    cpbuscar.on("click", function (event) {
        buscarcp();
    });
});

function initMap() {
    var myLatlng = {lat: 23.8295505, lng: -102.5732324};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5,
        center: myLatlng
    });
    var elevator = new google.maps.ElevationService;

    map.addListener('click', function (e) {

        for (var i = 0; i < marcadores.length; i++) {
            marcadores[i].setMap(null);
        }
        marcadores = [];

        marcador = new google.maps.Marker({
            position: e.latLng,
            map: map
        });
        map.panTo(e.latLng);
        marcadores[0] = marcador;

        latitud.val(e.latLng.lat());
        longitud.val(e.latLng.lng());

        elevator.getElevationForLocations({
            'locations': [e.latLng]
        }, function (results, status) {
            altitud.val(results[0].elevation);
        });

    });
}

function buscarcp() {
    var divAsentamientos = $("#asentamientos");
    var divEstado = $("#estado")
    var urlbuscar = '/datos/buscar-cp';
    var datosbuscar = {
        cp: cp.val()
    };
    var jsonbuscar = funciones.forms(urlbuscar, 'GET', datosbuscar);

    divAsentamientos.empty();
    if (jsonbuscar.bandera) {

        var divColMd = $('<div class="col-md-4">');
        var divFormGroup = $('<div class="form-group">');
        var labelColonia = $('<label>Colonia</label>');
        var selectColonia = $('<select class="form-control" name="idSepomex"/>');
        var labelEstado = $('<label>Estado</label>');
        var textEstado = $('<text class="form-control" name="estado"/>')


        $.each(jsonbuscar.data, function (k, v) {
            selectColonia.append('<option value="' + v.id + '">' + v.asentamiento + '</option>');
            
        });



        divFormGroup.append(labelColonia).append(selectColonia);
        divColMd.append(divFormGroup);
        divAsentamientos.append(divColMd);

        divFormGroup.append(labelEstado).append(textEstado);
        divColMd.append(divFormGroup);
        divEstado.append(divColMd);



    }
}