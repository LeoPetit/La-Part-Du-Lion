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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/connection.css">
    <?php $this->load->view("Nav/header.php") ?>
    <?php $this->load->view("Nav/navbar.php") ?>
</head>

<body>

<h1 style="text-align: center; margin:100px auto 50px auto;">Choix du clan</h1>
<?php
    echo form_open("Utilisateur_Controller/enregistrement"/*, 'class = "form_user"'*/);
    echo form_hidden('pseudo', $_POST["pseudo"]);
    echo form_hidden('Mail', $_POST["Mail"]);
    echo form_hidden('password', $_POST["password"]);
?>

<div class="menu row">
    <ul>
        <li class="listItem">
            <a href="" class="menuItem">Technomancien</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[0]->nom);?></h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span class="lead" id="content1">'.$descriptif[0]->descriptif.'</span> ';

                echo form_label('Choisir ce clan', 'clan1', $attributes);

                $data = array(
                    'name'          => 'clan',
                    'id'            => 'clan1',
                    'value'         => '1',
                    'class'         => 'bouton',
                );

                echo form_radio($data);


                echo "</br>";

                $attributes = array(
                    'class' => 'control-label',
                );?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">Les résistants</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[2]->nom)?></h3>
                <?php
                    $attributes = array(
                    'class' => 'control-labelCheckBox',
                    );

                    echo '<span class="lead" id="content2">'.$descriptif[2]->descriptif.'</span> ';


                    echo "</br>";


                    echo form_label('Choisir ce clan', 'clan2', $attributes);

                    $data = array(
                        'name'          => 'clan',
                        'id'            => 'clan2',
                        'value'         => '2',
                        'class'         => 'bouton',
                    );

                    echo form_radio($data);
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">RedStone</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[6]->nom)?></h3>
                <?php
                    $attributes = array(
                        'class' => 'control-labelCheckBox',
                    );

                    echo '<span class="lead" id="content3">'.$descriptif[6]->descriptif.'</span> <br/>';

                    echo form_label('Choisir ce clan', 'clan3', $attributes);

                    $data = array(
                        'name'          => 'clan',
                        'id'            => 'clan3',
                        'value'         => '3',
                        'class'         => 'bouton',
                    );

                    echo form_radio($data);


                    $data = array(
                        'name'          => 'validerEnregistrement',
                        'id'            => 'validationButton',
                        'value'         => 'Valider inscription',
                    );
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">La tour</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[3]->nom)?></h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span class="lead" id="content4">'.$descriptif[3]->descriptif.'</span> <br/>';


                echo form_label('Choisir ce clan', 'clan4', $attributes);

                $data = array(
                    'name'          => 'clan',
                    'id'            => 'clan4',
                    'value'         => '4',
                    'class'         => 'bouton',
                );

                echo form_radio($data);

                $data = array(
                    'name'          => 'validerEnregistrement',
                    'id'            => 'validationButton',
                    'value'         => 'Valider inscription',
                );

                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">Les Négociants</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[5]->nom)?></h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span class="lead" id="content5">'.$descriptif[5]->descriptif.'</span> <br/>';

                echo form_label('Choisir ce clan', 'clan5', $attributes);

                $data = array(
                    'name'          => 'clan',
                    'id'            => 'clan5',
                    'value'         => '5',
                    'class'         => 'bouton',
                );

                echo form_radio($data);


                $data = array(
                    'name'          => 'validerEnregistrement',
                    'id'            => 'validationButton',
                    'value'         => 'Valider inscription',
                );

                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">Les Exilés</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[1]->nom)?></h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span class="lead" id="content6">'.$descriptif[1]->descriptif.'</span> <br/>';

                echo form_label('Choisir ce clan', 'clan6', $attributes);

                $data = array(
                    'name'          => 'clan',
                    'id'            => 'clan6',
                    'value'         => '6',
                    'class'         => 'bouton',
                );

                echo form_radio($data);


                $data = array(
                    'name'          => 'validerEnregistrement',
                    'id'            => 'validationButton',
                    'value'         => 'Valider inscription',
                );

                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">La forteresse</a>
            <div class="animatedItem">
                <h3><?php echo($descriptif[4]->nom)?></h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span class="lead" id="content7">'.$descriptif[4]->descriptif.'</span> <br/>';

                echo form_label('Choisir ce clan', 'clan7', $attributes);

                $data = array(
                    'name'          => 'clan',
                    'id'            => 'clan7',
                    'value'         => '7',
                    'class'         => 'bouton',
                );

                echo form_radio($data);

                $data = array(
                    'name'          => 'validerEnregistrement',
                    'id'            => 'validationButton',
                    'value'         => 'Valider inscription',
                );
                ?>
            </div>
        </li>
    </ul>
</div>
    <?php
        echo form_submit($data);

        echo "</form>";
    ?>

</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

<script type="text/javascript" src="<?php echo base_url();?>application/JS/choixClan.js"></script>

</html>
