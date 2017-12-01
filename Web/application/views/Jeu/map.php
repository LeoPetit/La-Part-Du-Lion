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
<div id="legendeMap">
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_exilés.png"/>
        <h5>Clan des Exilés</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_forteresse.png"/>
        <h5>Clan de la Forteresse</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_negociants.png"/>
        <h5>Clan des Negociants</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_redstones.png"/>
        <h5>Clan des Redstones</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_resistants.png"/>
        <h5>Clan des Resistants</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_technomanciens.png"/>
        <h5>Clan des Technomanciens</h5>
    </div>
    <div class="legendeClan">
        <img src="<?php echo base_url()?>../divers/images/logos/png/logo_tour.png"/>
        <h5>Clan de la Tour</h5>
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