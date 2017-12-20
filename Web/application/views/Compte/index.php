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
    <title>Test de la map</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/compte.css">
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>


<div class="bloc_compte col-lg-6" >
    <div class="titre">
        <?php
        echo "<h3>Infos compte de ".$_SESSION["utilisateur"]->pseudo."</h3>";
        ?>
    </div>
    <div class="info_compte">
        <div class="champInfo">
            <?php
            echo "<h6>Pseudo : ".$_SESSION["utilisateur"]->pseudo."</h6>";
            ?>
        </div>

        <div class="champInfo">
            <?php
            echo form_open("Utilisateur_Controller/updateMdp", 'class = "form_user"');
            echo "<h6>mot de passe : ".$_SESSION["utilisateur"]->mdp."</h6>";
            $attributes = array(
                'class' => 'control-label',
            );

            $data = array(
                'name'          => 'Password',
                'id'            => 'Password',
                'class'         => 'inputData',
                'type'          => 'password',
                'value'         => '',
                'placeholder' => 'Mot de passe',
            );

            echo form_input('Mot de passe', 'password',$data);
            echo anchor('Utilisateur_Controller/updateMdp/', 'Modifier', 'class="boutonModification"');
            ?>
        </div>
        <div class="champInfo">
            <?php
            echo "<h6>email :".$_SESSION["utilisateur"]->email."</h6>";
            $attributes = array(
                'class' => 'control-label',
            );

            $data = array(
                'name'          => 'mail',
                'id'            => 'mail',
                'class'         => 'inputData',
                'type'          => 'text',
                'value'         => '',
                'placeholder' => 'mail',
            );

            echo form_input('Mail', 'mail',$data);
            $data = array(
                'name'          => 'Modifier',
                'class'         => 'boutonModification',
                'value'         => 'Modifier',
            );

            echo form_submit($data);
            ?>
            </form>
        </div>

    </div>
</div>



</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>
