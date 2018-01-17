<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 26/12/2017
 * Time: 20:05
 */
session_start();
?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Part du Lion</title>
    <?php $this->load->view('Nav/header.php') ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/CSS/telecharger.css">
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>
    <div class="container">
        <div class="infosTelecharger">
            <h2 class="title"> TÉLÉCHARGER LA PART DU LION </h2>
            <div class="col-sm-12 main">
                <div class="col-lg-4">
                    <img class="backLogo" src="<?php echo base_url()?>application/assets/images/logos/png/logo.png" alt="">
                </div>
                <div class="col-sm-8 links">
                    <p>Rejoignez le combat !</p>
                   <a href="<?php echo base_url()?>application/assets/ressources/laPartDuLion.apk" download="LaPartDuLion.apk"> <img class="androidButton" src="<?php echo base_url()?>application/assets/images/androidButton.png" alt=""></a><br>
                    <?php echo anchor('Utilisateur_Controller', 'Pas encore de compte ? Creez-en un !', '"'); ?>
                </div>
            </div>
            <div class="col-sm-12 more">
                <?php echo anchor('Welcome', 'Comment jouer ?', '"'); ?>
            </div>
        </div>
    </div>
</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>
