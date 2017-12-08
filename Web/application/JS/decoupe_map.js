/**
 * Created by leo on 11/10/17.
 */

var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var polygonId;


$(document).ready(function() {

    $("#infoQuartier").on("hidden.bs.modal", function () {
        $('#plusInfo').show();
        $('#plusInfoDiv').html("");
        $('#plusInfoDivClassement').html("");

    });
    $("#plusInfo").on("click", function(e){
        console.log(polygonId);
        $.ajax({
            type : 'POST',
            url: url + "Quartier_Controller/info/",
            dataType: 'json',
            data : {
                'polygonId' : polygonId
            },
            success: function(data) {
                quartier = data;
                console.log(quartier);
                $('#plusInfoDiv').html(
                    "<h6>Revenus par heure : "+ quartier[0].revenus+"</h6>"
                );

                $('#plusInfo').hide();
            },
            error : function(e) {
                console.log(e);
            }
        });

        $.ajax({
            type : 'POST',
            url: url + "PointEquipe_Controller/classement/",
            dataType: 'json',
            data : {
                'polygonId' : polygonId
            },
            success: function(data) {
                classement = data;
                console.log(classement);
                var affichage ="";
                for( var i =0; i<classement.length; i++)
                {
                    affichage += classement[i].nomClan +" : "+classement[i].nbpoints+" points <br>"
                }
                $('#plusInfoDivClassement').html(
                    affichage
                );
            },
            error : function(e) {
                console.log(e);
            }
        });
    });
});


function myMap() {
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

        //console.log("Quartier_id " + quartier_id);

        while (coordonnees[i].quartier_id == quartier_id) {
            //console.log(coordonnees[i].quartier_id + " " + quartier_id);
            //console.log(coordonnees[i].lat + "  " + coordonnees[i].longi + " " + i);
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

        var flightPath = new google.maps.Polygon({
            path: tabCoord,
            strokeColor: coordonnees[i - 1].couleur,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: coordonnees[i - 1].couleur,
            fillOpacity: 0.15,
            indexID: coordonnees[i - 1].quartier_id,
            possesseur: coordonnees[i - 1].possesseur,
            nom: coordonnees[i - 1].quartier_nom
        });

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