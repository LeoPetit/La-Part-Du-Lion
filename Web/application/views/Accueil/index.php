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
    <title>La Part du Lion</title>
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>
<body>
    <div class="home"></div>
    <div class="content">
        <img class="home_logo" src="<?php echo base_url()?>../divers/images/logos/png/logo.png" alt="">
        <div class="home_text">La Part du Lion</div>
        <div class="infos">
            <div class="details row col-lg-10">
                <div class="details col-lg-6">
                    <H3>Qu'est-ce que "La part du lion" ?</H3>
                    <p class="lead">La part du Lion est un jeu mobile de conquète en équipe à travers la ville de Belfort. Rejoignez l'un des sept clans dans cette guerres est faites le grandirafin de devenirle plus puissant de la ville.</p>
                </div>
                <img class="phone col-lg-6" src="<?php echo base_url()?>../divers/images/phone.png" alt="">
            </div>
        </div>
        <div class="moreInfos">
            <div class="details row col-lg-10">
                <img class="home_logo_details col-lg-6" src="<?php echo base_url()?>../divers/images/logos/png/logo.png" alt="">
                <div class="moreDetails col-lg-6">
                    <H3>En vrai c'est quoi LOL ? ?</H3>
                    <p class="lead">La part du Lion est un jeu mobile de conquète en équipe à travers la ville de Belfort. Rejoignez l'un des sept clans dans cette guerres est faites le grandirafin de devenirle plus puissant de la ville.</br></p>
                    <p class="lead">La part du Lion est un jeu mobile de conquète en équipe à travers la ville de Belfort. Rejoignez l'un des sept clans dans cette guerres est faites le grandirafin de devenirle plus puissant de la ville.</br></p>
                    <p class="lead">La part du Lion est un jeu mobile de conquète en équipe à travers la ville de Belfort. Rejoignez l'un des sept clans dans cette guerres est faites le grandirafin de devenirle plus puissant de la ville.</p>
                </div>
            </div>
        </div>
        <div class="clans">
            <div class="container">
                <div class="leftClan row col-lg-6"></div>
                <div class="rightClan row col-lg-6"></div>
                <div class="leftClan row col-lg-6"></div>
                <div class="rightClan row col-lg-6"></div>
                <div class="leftClan row col-lg-6"></div>
                <div class="rightClan row col-lg-6"></div>
                <div class="leftClan row col-lg-6"></div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>