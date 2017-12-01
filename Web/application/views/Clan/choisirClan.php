<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 01/12/17
 * Time: 10:10
 */
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

<div class="menu">
    <ul>
        <li class="listItem">
            <a href="" class="menuItem">Home</a>
            <div class="animatedItem">
                <h3>Home</h3>
                <p>Bienvenue sur le site CSS3Create</p>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">News</a>
            <div class="animatedItem">
                <h3>News</h3>
                <p>Pleins de news sur CSS3 et sur HTML5</p>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">News</a>
            <div class="animatedItem">
                <h3>News</h3>
                <p>Pleins de news sur CSS3 et sur HTML5</p>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">News</a>
            <div class="animatedItem">
                <h3>News</h3>
                <p>Pleins de news sur CSS3 et sur HTML5</p>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">News</a>
            <div class="animatedItem">
                <h3>News</h3>
                <p>Pleins de news sur CSS3 et sur HTML5</p>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">News</a>
            <div class="animatedItem">
                <h3>News</h3>
                <p>Pleins de news sur CSS3 et sur HTML5</p>
            </div>
        </li>
    </ul>
</div>
    <?php

        echo form_open("Utilisateur_Controller/enregistrement"/*, 'class = "form_user"'*/);

        echo form_hidden('pseudo', $_POST["pseudo"]);
        echo form_hidden('Mail', $_POST["Mail"]);
        echo form_hidden('password', $_POST["password"]);


        $attributes = array(
            'class' => 'control-label',
        );

        echo form_label('Technomancien', 'clan1', $attributes);

        $data = array(
            'name'          => 'clan',
            'id'            => 'clan1',
            'value'         => '1',
            'class'         => 'bouton',
        );

        echo form_radio($data);

        echo '<p id="content1">1</p> ';

        echo "</br>";

        $attributes = array(
            'class' => 'control-label',
        );

        echo form_label('Defenseur', 'clan2', $attributes);

        $data = array(
            'name'          => 'clan',
            'id'            => 'clan2',
            'value'         => '2',
            'class'         => 'bouton',
        );

        echo form_radio($data);

        echo '<p id="content2">2</p> ';


        echo "</br>";

        $attributes = array(
            'class' => 'control-label',
        );

        echo form_label('RedStone', 'clan3', $attributes);

        $data = array(
            'name'          => 'clan',
            'id'            => 'clan3',
            'value'         => '3',
            'class'         => 'bouton',
        );

        echo form_radio($data);

        echo '<p id="content3">3</p> <br/>';

        $data = array(
            'name'          => 'validerEnregistrement',
            'id'            => 'validationButton',
            'value'         => 'Valider inscription',
        );

        echo form_submit($data);

        echo "</form>";
    ?>

</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

<script type="text/javascript" src="<?php echo base_url();?>application/JS/choixClan.js"></script>

</html>
