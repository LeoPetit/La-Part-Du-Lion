/**
 * Created by leo on 11/10/17.
 */

function myMap() {
    var center = new google.maps.LatLng(47.642,6.838);

    $.ajax({
        type : 'POST',
        url: "http://localhost/projet_licence/La-Part-Du-Lion/Web/application/controllers/Coordonnees_Controller.php/show",
        dataType: 'json',
        success: function(data) {
            var res = eval(data);
            console.log(res);
        },
        error : function(e) {
            console.log(e);
        }
    });

    var mapCanvas = document.getElementById("googleMap");
    var mapOptions = {center: center, zoom: 14, mapTypeId: 'satellite'};
    var map = new google.maps.Map(mapCanvas,mapOptions);

    /*var flightPath = new google.maps.Polyline({
        path: [stavanger, amsterdam, london],
        strokeColor: "#36003A",
        strokeOpacity: 0.8,
        strokeWeight: 2
    });

    flightPath.setMap(map);*/
}