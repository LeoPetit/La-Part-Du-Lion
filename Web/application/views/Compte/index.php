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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/compte.css">
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>


<div id="bloc_Compte" >
    <div class="titre">
        <?php
            echo "<h3>Infos compte de ".$_SESSION["utilisateur"]->pseudo."</h3>";
        ?>
    </div>
    <div class="champInfo">
        <?php
        echo "<h6>Pseudo ".$_SESSION["utilisateur"]->pseudo."</h6>";
        ?>
    </div>

    <div class="champInfo">
        <?php
        echo "<h6>mot de passe : </h6><p> ".$_SESSION["utilisateur"]->mdp."</p>";
        echo anchor('Utilisateur_Controller/modifierInfo/champ/mdp', 'Modifier', 'class="boutonModifiction"');
        ?>
    </div>
    <div class="champInfo">
        <?php
        echo "<h6>email : </h6><p>".$_SESSION["utilisateur"]->email."</p>";
        echo anchor('Utilisateur_Controller/modifierInfo/champ/email', 'Modifier', 'class="boutonModifiction"');
        ?>
    </div>
    </div>
</div>



</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>
