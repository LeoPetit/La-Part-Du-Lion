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
foreach ($item as $items)
{
    // créer une div et affiche l'items
    echo '<div class="articleItem">';
    echo '<div class="imgItem"><img src="application/assets/images/items/'.$item->nom.'.png"> </div>';
    echo '<div class="titreItem">'.$item->nom.'</div>';
    echo '<div class="prixItem"><img src="application/assets/images/items/monnaie.png">'.$item->coutAchat.'</div>';
    echo form_radio();
    echo '</div>';
}
?>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>