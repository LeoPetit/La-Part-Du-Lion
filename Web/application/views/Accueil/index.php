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
        <div class="clans col-lg-10">
            <div class="container">
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_technomanciens.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4>Technomancien</h4>
                        <p class="lead">Ces savants fous sont des exclus de la société, leurs experiences dont souvent peur aux enfants ainsi qu aux quinquagénaires.</p>
                    </div>
                </div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4>Les résistants</h4>
                        <p class="lead">Depuis l aube des temps, les resistants se dressent contre les lois afin d établir les leurs, qu ils trouvent moins débiles.</p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_resistants.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_redstones.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4>RedStone</h4>
                        <p class="lead">C est dans les Redstones que les plus grands bandits et délinquants de notre époque s évicent. C est un endroit dangereux et occupé par les pires malendrins connus.</p>
                    </div></div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4>La Tour</h4>
                        <p class="lead">Une bien belle batisse fut conçu, d après la légende, par le dieu lion. Ses adèptes la protègent toujours au peril de leur vie.</p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_tour.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_negociants.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4>Les Négociants</h4>
                        <p class="lead">Les plus fourbes de cette contrée arpentent les rues belfortaines afin de vendre leurs produits les plus rares au plus offrant.</p>
                    </div></div>
                <div class="rightClan row col-lg-8">
                    <div class="moreDetails col-lg-6">
                        <h4>Les Exilés</h4>
                        <p class="lead">Les derniers membres de l ancien clan –Ø]‰‰@Ûå– se sont écilés dans la partie plus retranchée de Belfort avant de se venger des clans de la tour et de la fortesresse.</p>
                    </div>
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_exilés.png" alt="">
                </div>
                <div class="leftClan row col-lg-8">
                    <img class="home_logoClan_details col-lg-4" src="<?php echo base_url()?>../divers/images/logos/png/logo_forteresse.png" alt="">
                    <div class="moreDetails col-lg-6">
                        <h4>La Forteresse</h4>
                        <p class="lead">Les défenseurs de cette forteresse gardent un précieux trésor en son sein. Cependant, personne ne sait ce sue c est...</p>
                    </div></div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php $this->load->view('Nav/footer.php') ?>

</footer>

</html>