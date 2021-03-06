<?php
/**
 * Created by PhpStorm.
 * User: jérémy renaud
 * Date: 06/02/2018
 * Time: 14:05
 */

if(!isset($_SESSION['utilisateur']))
    session_start();

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Part du Lion</title>
    <?php $this->load->view("Nav/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/boutique.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/competence.css">
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

<?php
if(!isset($_SESSION["utilisateur"]))
{
    header('Location:'. base_url().'index.php/Utilisateur_Controller');
}
?>
<div class="budgetItem"><?php echo $_SESSION["utilisateur"]->gold?> <img src="<?php echo base_url()?>application/assets/images/items/png/monnaie.png"></div>
<div id="message">
    <?php  if(isset($error))
    {
        echo "<script type='text/javascript'>alert('pas assez d argent')</script>";
    }
    ?>
</div>

<div id="tree-simple"> </div>

<div id="test" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="description" id="descComp"></p>
                <label for="nom">Ajouter</label>
                <input type="number" name="goldAjout" id="gold" min="1" max="<?php echo $_SESSION["utilisateur"]->gold;?>"/>
            </div>

            <div class="modal-footer">
                <button type="button" id="addGold" class="btn btn-primary">Ajouter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>

        </div>
    </div>
</div>

</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/JS/competence.js"></script>

</footer>

</html>
