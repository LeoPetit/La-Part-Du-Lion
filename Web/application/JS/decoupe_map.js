/**
 * Created by leo on 11/10/17.
 */

var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";

window.onresize = function(event) {
    if (window.matchMedia('(min-width: 990px)').matches) {
        var height = window.innerHeight - $(".navbar").outerHeight(true) - $("#legendeMap").outerHeight(true);
        $("#googleMap").css("height", height + 'px');
    }
};


function myMap() {

    if (window.matchMedia('(min-width: 990px)').matches) {
        var height = window.innerHeight - $(".navbar").outerHeight(true) - $("#legendeMap").outerHeight(true) * 1.5;
        $("#googleMap").css("height", height + 'px');
    }
    else{
        $("#googleMap").css("height", 60 + 'vh');

    }

    var center = new google.maps.LatLng(47.640, 6.850);

    var mapCanvas = document.getElementById("googleMap");
    var mapOptions = {center: center, zoom: 14};
    var map = new google.maps.Map(mapCanvas, mapOptions);

    $.ajax({
        type: 'POST',
        url: url + "Coordonnees_Controller/show",
        dataType: 'json',
        async: false,
        success: function (data) {
            coordonnees = data;
        },
        error: function (e) {
            console.log(e);
        }
    });

    var quartier_id = coordonnees[0].quartier_id;

    var tabCoord = [];
    var test = [];

    var i = 0;

    while (i < coordonnees.length - 1) {
        while (coordonnees[i].quartier_id == quartier_id) {
            test.push(coordonnees[i].lat, coordonnees[i].longi);
            tabCoord.push(new google.maps.LatLng(coordonnees[i].lat, coordonnees[i].longi));
            if (coordonnees[i + 1] != null) {
                i++;
            } else {
                quartier_id = 0;
            }
        }

        var addListenersOnPolygon = function (polygon) {
            google.maps.event.addListener(polygon, 'click', function (event) {
                polygonId = polygon.indexID;
                $('#infoQuartierHead').html("Info Quartier " + polygon.nom);
                $('#infoQuartierBody').html("<h5>Controlé par : " + polygon.possesseur + "</h5>");
                $('#infoQuartier').modal('show');
            });
        };

        var flightPath;

        console.log(coordonnees[i-1].QG);

        if(coordonnees[i-1].QG == 1) {
            flightPath = new google.maps.Polygon({
                path: tabCoord,
                strokeColor: coordonnees[i - 1].couleur,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: coordonnees[i - 1].couleur,
                fillOpacity: 0.50,
                indexID: coordonnees[i - 1].quartier_id,
                possesseur: coordonnees[i - 1].possesseur,
                nom: coordonnees[i - 1].quartier_nom
            });
        } else {
            flightPath = new google.maps.Polygon({
                path: tabCoord,
                strokeColor: coordonnees[i - 1].couleur,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: coordonnees[i - 1].couleur,
                fillOpacity: 0.25,
                indexID: coordonnees[i - 1].quartier_id,
                possesseur: coordonnees[i - 1].possesseur,
                nom: coordonnees[i - 1].quartier_nom
            });
        }

        flightPath.setMap(map);
        addListenersOnPolygon(flightPath);


        while (tabCoord.length > 0) {
            tabCoord.pop();
        }

        while (test.length > 0) {
            test.pop();
        }

        if (coordonnees[i + 1] != null) {
            quartier_id = coordonnees[i].quartier_id;
        }
    }
}