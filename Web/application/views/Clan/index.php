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
    <title>Test de la map</title>
    <?php $this->load->view("Nav/header.php") ?>
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

    <img id="imageClan" src="<?php echo base_url()?>../divers/images/logos/png/logo_technomanciens.png"/>

    <div>
        <h5>Control de la carte :</h5>
        <?php echo round($controlled,2)."%"; ?>
    </div>

    <div>
        <label>Classement :</label>
        <?php echo '<span>'.$classement.'</span>';?>
        <br/>
        <label>Ressource/Jour :</label>
        <?php echo '<span>'.$revenusEquipe.'</span>';?>

    </div>

</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>