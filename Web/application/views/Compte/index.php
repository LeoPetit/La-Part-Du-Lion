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
    <title>Part du Lion</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/CSS/compte.css">
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>


<div class="bloc_compte col-lg-6">
    <div class="titre">
        <?php
        echo "<h3>Infos compte de " . $_SESSION["utilisateur"]->pseudo . "</h3>";
        ?>
    </div>
    <div class="info_compte">
        <div class="champInfo">
            <?php
            echo "<h6>Pseudo : " . $_SESSION["utilisateur"]->pseudo . "</h6>";
            ?>
        </div>

        <div class="champInfo">
            <?php
            echo form_open("Utilisateur_Controller/updateMdp", 'class = "form_user"');

            echo "<h6>mot de passe : " . $_SESSION["utilisateur"]->mdp . "</h6>";
            $attributes = array(
                'class' => 'control-label',
            );

            $data = array(
                'name' => 'password',
                'id' => 'password',
                'class' => 'inputData',
                'type' => 'password',
                'placeholder' => 'Mot de passe',
            );

            echo form_input('password', '', $data);

            $data = array(
                'name' => 'Modifier',
                'class' => 'boutonModification',
                'value' => 'Modifier',
            );

            echo form_submit($data);

            echo '<span class="spanError">'.validation_errors()."</span>";

            echo form_close();
            ?>
        </div>
        <div class="champInfo">
            <?php
            echo form_open("Utilisateur_Controller/updateEmail", 'class = "form_user"');

            echo "<h6>email :" . $_SESSION["utilisateur"]->email . "</h6>";
            $attributes = array(
                'class' => 'control-label',
            );

            $data = array(
                'name' => 'mail',
                'id' => 'mail',
                'class' => 'inputData',
                'type' => 'text',
                'placeholder' => 'Email',
            );

            echo form_input('mail', '', $data);

            $data = array(
                'name' => 'Modifier',
                'class' => 'boutonModification',
                'value' => 'Modifier',
            );

            echo form_submit($data);

            echo form_close();
            ?>
        </div>

    </div>
</div>


</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>
