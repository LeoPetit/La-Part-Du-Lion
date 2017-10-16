/**
 * Created by leo on 11/10/17.
 */
function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(47.642,6.838),
        zoom:14,
        mapTypeId: 'satellite'
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}