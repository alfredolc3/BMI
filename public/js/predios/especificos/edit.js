var cp = $("#cp");
var cpbuscar = $("#cp-buscar");
var marcadores = [];
var latitud = $("#latitud");
var longitud = $("#longitud");
var altitud = $("#altitud");

$(document).on("ready", function () {

    var idSepomex = $("#idSepomex");
    buscarcp(idSepomex);
    cpbuscar.on("click", function (event) {
        buscarcp();
    });
});

function initMap() {
    var myLatlng = {lat: parseFloat(latitud.val()), lng: parseFloat(longitud.val())};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: myLatlng
    });

    marcador = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        map.panTo(myLatlng);
        marcadores[0] = marcador;

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

function buscarcp(idSepomex) {
    var divAsentamientos = $("#asentamientos");
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

        $.each(jsonbuscar.data, function (k, v) {
            selectColonia.append('<option value="' + v.id + '">' + v.asentamiento + '</option>');
        });
        if(idSepomex){
            selectColonia.val(idSepomex.val());
        }

        divFormGroup.append(labelColonia).append(selectColonia);
        divColMd.append(divFormGroup);
        divAsentamientos.append(divColMd);

    }
}