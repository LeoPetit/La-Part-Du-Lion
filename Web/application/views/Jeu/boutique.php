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
    <title>Part du Lion</title>
    <?php $this->load->view("Nav/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/boutique.css">
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

<div class="budgetItem"><?php echo $_SESSION["utilisateur"]->gold?> <img src="<?php echo base_url()?>application/assets/images/items/png/monnaie.png"></div>
<div class="inventaireContent">
    <h4> Inventaire </h4>
    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

    <img class="imgItem inventaire" src="<?php echo base_url()?>application/assets/images/items/png/Piege classique.png">
    <span>x3</span>

</div>

<div class="shopContent col-sm-10">
    <?php
    foreach ($items as $item)
    {
        // créer une div et affiche l'items
        echo '<div class="articleItem col-lg-5">';
        echo '<img class="imgItem" src="'.base_url().'application/assets/images/items/png/'.$item->nom.'.png">';
        echo '<div class="moreDetails col-sm-5">';
        echo '<div class="titreItem">'.$item->nom.'</div>';
        echo '<div class="titreItem">fhuezif huzfizhfu izfhu zifh uzihf uizfhuz fhuiz hfui zhfuize </div>';
        echo '</div>';
        echo '<div class="prixItem col-md-3">Prix: '.$item->coutAchat.'<img src="'.base_url().'application/assets/images/items/png/monnaie.png"> PA : '.$item->coutRessource.'</div>';
        //echo anchor('Utilisateur_Controller/achat/item_id/'.$item->id."/prix/".$item->coutAchat, 'Acheter', 'class="boutonAchat"');
        echo '</div>';

    }
    ?>
</div>



</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>