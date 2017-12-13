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

<?php
foreach ($items as $item)
{
    // créer une div et affiche l'items
    echo '<div class="articleItem">';
    echo '<div class="imgItem"><img src="'.base_url().'application/assets/images/items/png/'.$item->nom.'.png"> </div>';
    echo '<div class="titreItem">'.$item->nom.'</div>';
    echo '<div class="prixItem"><img src="'.base_url().'application/assets/images/items/png/monnaie.png">'.$item->coutAchat.'</div>';
    echo '<div class="titreItem"><p>Utilisation : </p>'.$item->coutRessource.'</div>';
    echo form_radio();
    echo '</div>';
}
?>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>