/**
 * Created by leo on 11/10/17.
 */

function myMap() {
    var center = new google.maps.LatLng(47.640,6.850);

    var mapCanvas = document.getElementById("googleMap");
    var mapOptions = {center: center, zoom: 14};
    var map = new google.maps.Map(mapCanvas,mapOptions);

    $.ajax({
        type : 'POST',
        url: "http://localhost/projet_licence/Fonctionne/La-Part-Du-Lion/Web/index.php/Coordonnees_Controller/show",
        dataType: 'json',
        async : false,
        success: function(data) {
            coordonnees = data;
        },
        error : function(e) {
            console.log(e);
        }
    });

    console.log(coordonnees);

    var quartier_id = coordonnees[0].quartier_id;

    var tabCoord = [];
    var test = [];

    var i = 0;

    while(i < coordonnees.length-1) {

        console.log("Quartier_id " + quartier_id);

        while (coordonnees[i].quartier_id == quartier_id) {
            //console.log(coordonnees[i].quartier_id + " " + quartier_id);
            console.log(coordonnees[i].lat + "  " + coordonnees[i].longi + " " + i);
            test.push(coordonnees[i].lat, coordonnees[i].longi);
            tabCoord.push(new google.maps.LatLng(coordonnees[i].lat, coordonnees[i].longi));
            if(coordonnees[i+1] != null) {
                i++;
            } else {
                quartier_id = 0;
            }
        }

        //console.log(test);

        var flightPath = new google.maps.Polygon({
            path: tabCoord,
            strokeColor: coordonnees[i - 1].couleur,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: coordonnees[i - 1].couleur,
            fillOpacity: 0.15
        });

        flightPath.setMap(map);

        while(tabCoord.length > 0) {
            tabCoord.pop();
        }

        while(test.length > 0) {
            test.pop();
        }

        if(coordonnees[i+1] != null) {
            quartier_id = coordonnees[i].quartier_id;
        }
    }
}