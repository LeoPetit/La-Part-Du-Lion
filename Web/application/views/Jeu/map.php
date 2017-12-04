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

<div id="googleMap" style="width:100%;height:620px;"></div>
<div id="legendeMap" class="row col-md-12">
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_exilés.png"/>
        <p class="legend">Clan des Exilés</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_forteresse.png"/>
        <p class="legend">Clan de la Forteresse</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_negociants.png"/>
        <p class="legend">Clan des Negociants</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_redstones.png"/>
        <p class="legend">Clan des Redstones</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_resistants.png"/>
        <p class="legend">Clan des Resistants</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_technomanciens.png"/>
        <p class="legend">Clan des Technomanciens</p>
    </div>
    <div class="legendeClan col-sm-3">
        <img class="legendPicture" src="<?php echo base_url()?>../divers/images/logos/png/logo_tour.png"/>
        <p class="legend">Clan de la Tour</p>
    </div>

</div>

<script src="<?php echo base_url(); ?>application/JS/decoupe_map.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/jquery-3.2.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsFGv1OfVECH-3gs5BlGXlESiF3WY5tis&callback=myMap"></script>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>