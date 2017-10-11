<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 11/10/17
 * Time: 10:07
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Test de la map</title>
</head>

<body>

<div id="googleMap" style="width:100%;height:800px;"></div>

<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(47.642,6.838),
            zoom:14,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsFGv1OfVECH-3gs5BlGXlESiF3WY5tis&callback=myMap"></script>

</body>

</html>