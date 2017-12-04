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

<h1 style="text-align: center; margin-top:30px;">Choix du clan</h1>
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
                <h3>Technomancien</h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span id="content1">Ces savants fous sont des exclus de la société, leurs experiences dont souvent peur aux enfants ainsi qu aux quinquagénaires.</span> ';

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
                <h3>Les résistants</h3>
                <?php
                    $attributes = array(
                    'class' => 'control-labelCheckBox',
                    );

                    echo '<span id="content2">Depuis l aube des temps, les resistants se dressent contre les lois afin d établir les leurs, qu ils trouvent moins débiles.</span> ';


                    echo "</br>";


                    echo form_label('Choisir ce clan', 'clan2', $attributes);

                    $data = array(
                        'name'          => 'clan',
                        'id'            => 'clan2',
                        'value'         => '2',
                        'class'         => 'bouton',
                    );

                    echo form_radio($data);

                    $attributes = array(
                    'class' => 'control-label',
                    );

                    echo "</form>";
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">RedStone</a>
            <div class="animatedItem">
                <h3>RedStone</h3>
                <?php
                    $attributes = array(
                        'class' => 'control-labelCheckBox',
                    );

                    echo '<span id="content3">C est dans les Redstones que les plus grands bandits et délinquants de notre époque s évicent. C est un endroit dangereux et occupé par les pires malendrins connus. </span> <br/>';

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

                    echo "</form>";
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">La tour</a>
            <div class="animatedItem">
                <h3>La Tour</h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span id="content4">Une bien belle batisse fut conçu, d après la légende, par le dieu lion. Ses adèptes la protègent toujours au peril de leur vie.</span> <br/>';


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


                echo "</form>";
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">Les Négociants</a>
            <div class="animatedItem">
                <h3>Les Négociants</h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span id="content5">Les plus fourbes de cette contrée arpentent les rues belfortaines afin de vendre leurs produits les plus rares au plus offrant.</span> <br/>';

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


                echo "</form>";
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">Les Exilés</a>
            <div class="animatedItem">
                <h3>Les Exilés</h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span id="content6">Les derniers membres de l ancien clan –Ø]‰‰@Ûå– se sont écilés dans la partie plus retranchée de Belfort avant de se venger des clans de la tour et de la fortesresse.</span> <br/>';

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


                echo "</form>";
                ?>
            </div>
        </li>
        <li class="listItem">
            <a href="" class="menuItem">La forteresse</a>
            <div class="animatedItem">
                <h3>La Forteresse</h3>
                <?php
                $attributes = array(
                    'class' => 'control-labelCheckBox',
                );

                echo '<span id="content7">Les défenseurs de cette forteresse gardent un précieux trésor en son sein. Cependant, personne ne sait ce sue c est...</span> <br/>';

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

                echo "</form>";
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
