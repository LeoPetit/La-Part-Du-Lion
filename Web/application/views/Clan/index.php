<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 24/10/2017
 * Time: 16:21
 */
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Part du Lion</title>
    <?php $this->load->view("Nav/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/clan.css">
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>
    <?php

    if(!isset($_SESSION["utilisateur"]))
    {
        header('Location:'. base_url().'index.php/Utilisateur_Controller');
    }
        $data = array(
            'type'  => 'hidden',
            'name'  => 'couleur',
            'id'    => 'couleurUtilisateur',
            'value' => $_SESSION["utilisateur"]->couleur,
        );
        echo form_input($data);
    ?>

    <div class="clanStats row col-lg-8">
        <img id="imageClan" class="pictureClan" src="<?php echo base_url()?>application/assets/images/logos/png/logo_technomanciens.png"/>

        <div class="controlMap col-lg-4">
            <h5>Controle de la carte</h5>
            <div class="mapControl">
                <?php echo round($controlled,2)."%"; ?>
            </div>
        </div>

        <div class="elemClan col-lg-10">
            <label>Classement :</label>
            <?php echo '<span>'.$classement.'</span>';?>
            <br/>
            <label>Ressource/Jour :</label>
            <?php echo '<span>'.$revenusEquipe.'</span>';?>

        </div>
    </div>
</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

<script type="text/javascript" src="<?php echo base_url();?>application/JS/colorChanges.js"></script>

</html>