<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 12/12/17
 * Time: 11:34
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

<div class="budgetItem"> <img src="<?php echo base_url()?>application/assets/images/items/png/monnaie.png"></div>
    <div class="test col-lg-10">
        <?php
        foreach ($items as $item)
        {
            // créer une div et affiche l'items
            echo '<div class="articleItem row col-lg-6">';
            echo '<img class="imgItem" src="'.base_url().'application/assets/images/items/png/'.$item->nom.'.png">';
            echo '<div class="moreDetails col-sm-6">';
            echo '<div class="titreItem">'.$item->nom.'</div>';
            echo '<div class="titreItem">fhuezif huzfizhfu izfhu zifh uzihf uizfhuz fhuiz hfui zhfuize </div>';
            echo '</div>';
            echo '<div class="prixItem col-md-3">Prix: '.$item->coutAchat.'<img src="'.base_url().'application/assets/images/items/png/monnaie.png"> PA : '.$item->coutRessource.'</div>';

            echo '</div>';

        }
        ?>
</div>



</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>