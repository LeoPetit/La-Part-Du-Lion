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
    <?php $this->load->view("Nav/header.php") ?>
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

<div id="googleMap" style="width:100%;min-height: 82vh;"></div>
    <div id="legendeMap" class="row col-md-12">
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_exilés.png"/>
            <p class="legend">Clan des Exilés</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_forteresse.png"/>
            <p class="legend">Clan de la Forteresse</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_negociants.png"/>
            <p class="legend">Clan des Negociants</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_redstones.png"/>
            <p class="legend">Clan des Redstones</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_resistants.png"/>
            <p class="legend">Clan des Resistants</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_technomanciens.png"/>
            <p class="legend">Clan des Technomanciens</p>
        </div>
        <div class="legendeClan col-sm-3">
            <img class="legendPicture" src="<?php echo base_url()?>application/assets/images/logos/png/logo_tour.png"/>
            <p class="legend">Clan de la Tour</p>
        </div>

    </div>

<div class="modal fade" id="infoQuartier" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="infoQuartierHead"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="infoQuartierBody">
                <p>Some text in the modal.</p>
            </div>

            <button  id="plusInfo" type="button" class="btn btn-info btn-lg">
                Plus d'infos
            </button>

            <div id="plusInfo">
                <div id="chartContainerInfo"></div>
            </div>

            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
    <script src="<?php echo base_url(); ?>application/libraries/canvasjs-2.0/jquery.canvasjs.min.js"></script>
    <script src="<?php echo base_url(); ?>application/JS/decoupe_map.js"></script>
    <script src="<?php echo base_url(); ?>application/JS/quartierInfo.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsFGv1OfVECH-3gs5BlGXlESiF3WY5tis&callback=myMap"></script>
</footer>

</html>