<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 11/10/17
 * Time: 10:07
 */
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION["utilisateur"]->pseudo)) {
    echo "Bienvenue ".$_SESSION["utilisateur"]->pseudo."-kun";
}
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Test de la map</title>
    <?php $this->load->view("Nav/header.php") ?>
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

<div id="googleMap" style="width:100%;height:800px;"></div>

<script src="<?php echo base_url(); ?>application/JS/decoupe_map.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/jquery-3.2.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsFGv1OfVECH-3gs5BlGXlESiF3WY5tis&callback=myMap"></script>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>