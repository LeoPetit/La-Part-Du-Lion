<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 24/10/2017
 * Time: 16:21
 */
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Part du Lion</title>
    <?php $this->load->view('Nav/header.php') ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/home.css">

</head>
<body>

    <div class="home"></div>
    <div class="content">
        <img class="home_logo" src="<?php echo base_url()?>application/assets/images/logos/png/logo.png" alt="">
        <div class="home_text">La Part du Lion</div>
        <?php $this->load->view('Nav/navbar.php') ?>
        <div id="presentation" class="infos">
            <div class="details row col-lg-10">
                <div class="details col-lg-6">
                    <H3>Qu'est-ce que "La part du lion" ?</H3>
                    <p>La part du Lion est un jeu mobile de conquète en équipe à travers la ville de Belfort. Rejoignez l'un des sept clans dans cette guerre est faites le grandir afin de devenir le plus puissant de la ville.</p>
                    <img class="androidButton" src="<?php echo base_url()?>application/assets/images/androidButton.png" alt="">
                </div>
                <img class="phone col-lg-6" src="<?php echo base_url()?>application/assets/images/phone.png" alt="">
            </div>
        </div>
        <div class="moreInfos">
            <div class="details row col-lg-10">
                <img class="home_logo_details col-lg-6" src="<?php echo base_url()?>application/assets/images/logos/png/logo.png" alt="">
                <div class="moreDetails col-lg-6">
                    <H3>Agent rejoins l'aventure ! </H3>
                    <p>La ville de Belfort est le terrain d'une guerre de territoire ! Sept clans se livrent en secret à une lutte pour le controle de la ville !</br></p>
                    <p>Depuis déjà plusieurs siecles, la bataille fait rage, mais à l'époque des technologies des nouveaux "soldats" ont vu le jour : Les Agents.</br>Munis de leur smartphones ils mennent une bataille virtuelle pour la suprémacie</br></p>
                    <p> Rejoignez l'un des sept clans dans cette guerre est faites le grandir afin de devenir le plus puissant de la ville.</br></p>
                </div>
            </div>
        </div>
        <div class="clans col-lg-10">
            <div class="container">
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_technomanciens.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[0]->nom);?></h4>
                        <p><?php echo( $descriptif[0]->descriptif);?></p>
                    </div>
                </div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[2]->nom);?></h4>
                        <p><?php echo( $descriptif[2]->descriptif);?></p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_resistants.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_redstones.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[6]->nom);?></h4>
                        <p><?php echo( $descriptif[6]->descriptif);?></p>
                    </div>
                </div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[3]->nom);?></h4>
                        <p><?php echo( $descriptif[3]->descriptif);?></p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_tour.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_negociants.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[5]->nom);?></h4>
                        <p><?php echo( $descriptif[5]->descriptif);?></p>
                    </div>
                </div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[1]->nom);?></h4>
                        <p><?php echo( $descriptif[1]->descriptif);?></p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_exilés.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>application/assets/images/logos/png/logo_forteresse.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4><?php echo($descriptif[4]->nom);?></h4>
                        <p><?php echo( $descriptif[4]->descriptif);?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php $this->load->view('Nav/footer.php') ?>
    <script src="<?php echo base_url();?>application/JS/home.js"></script>

</footer>



</html>


