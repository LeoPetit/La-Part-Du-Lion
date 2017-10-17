/**
 * Created by leo on 11/10/17.
 */
    /*Test quartier 1 :
    [47.646239, 6.818084] , [47.647182, 6.824770],
     [47.645348, 6.828197] , [47.641843, 6.827979],
     [47.640323, 6.831121] , [47.646907, 6.833193],
     [47.651733, 6.825826], [47.650075, 6.821675 ],
     [47.646239, 6.818084]*/

function myMap() {
    var center = new google.maps.LatLng(47.642,6.838);

    $.ajax({
        type : 'ajax',
        url: "/projet_licence/La-Part-Du-Lion/Web/application/controllers/Coordonnees.php/show",
        dataType: 'json',
        success: function(data) {
            var res = eval(data);
            console.log(res);
        },
        error : function(e) {
            console.log(e)
        }
    });

    var stavanger = new google.maps.LatLng(47.646239, 6.818084);
    var amsterdam = new google.maps.LatLng(47.647182, 6.824770);
    var london = new google.maps.LatLng(47.645348, 6.828197);

    var mapCanvas = document.getElementById("googleMap");
    var mapOptions = {center: center, zoom: 14, mapTypeId: 'satellite'};
    var map = new google.maps.Map(mapCanvas,mapOptions);

    var flightPath = new google.maps.Polyline({
        path: [stavanger, amsterdam, london],
        strokeColor: "#36003A",
        strokeOpacity: 0.8,
        strokeWeight: 2
    });

    flightPath.setMap(map);
}