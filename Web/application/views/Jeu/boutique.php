<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 12/12/17
 * Time: 11:34
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
<div class="inventaireContent">
    <h4> Inventaire </h4>

    <?php
        foreach($inventaire as $i) {
            echo '<img title ="'.$i->nom.'" class="imgItem inventaire" src="'.base_url().$i->link.'">
            <span>x'.$i->nb.'</span>';
        }
    ?>

</div>

<div class="container">
    <?php
    foreach ($items as $item)
    {
        // créer une div et affiche l'items
        echo '<div class="articleItem col-lg-5">';
        echo '<img class="imgItem" src="'.base_url().$item->link.'">';
        echo '<div class="moreDetails col-lg-9">';
        echo '<h5>'.$item->nom.'</h5>';
        echo '<p>'.$item->libelle.'</p>';
        echo '</div>';

        echo '<div class="interactObject">';
        echo '<div class="prixItem col-md-3"><p>'.$item->coutAchat.'<img src="'.base_url().'application/assets/images/items/png/monnaie.png"></p><p>PA : '.$item->coutRessource.'</p></div>';
        echo '<div class="acheterItem">';
        $attributes = array('name' => 'formAchat'.$item->id);
        echo form_open('Inventaire_Controller/achat',$attributes);

        $attributes = array(
            'class' => 'control-label',
        );

        echo form_label('Quantite', 'quantite'.$item->id, $attributes);

        $data = array(
            'name'          => 'quantite'.$item->id,
            'id'            => 'quantite',
            'class'         => 'inputData',
            'type'          => 'number',
            'value'         => '1',
            'min'           => '1',
            'max'           => '5'
        );

        echo form_input($data);

        $data = array(
            'id'            =>'acheter',
            'name'          => 'Achat',
            'class'         => 'boutonAchat',
            'value'         => 'Acheter'
        );

        echo form_submit($data);

        $data = array(
            'idItem'  => $item->id
        );

        echo form_hidden($data);

        $data = array(
            'prixItem'  => $item->coutAchat
        );

        echo form_hidden($data);
        echo form_close();
        //echo '<input type="number" name="quantity" min="1" max="5">';
        //echo anchor('Utilisateur_Controller/achat/item_id/'.$item->id."/prix/".$item->coutAchat, 'Acheter', 'class="boutonAchat"');
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
    ?>
</div>



</body>

<footer>
    <?php $this->load->view("Nav/footer.php") ?>
</footer>

</html>