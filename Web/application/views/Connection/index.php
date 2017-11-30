<?php
/**
 * Created by PhpStorm.
 * User: jérémy renaud
 * Date: 29/11/2017
 * Time: 09:30
 */
?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Test de la map</title>
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>

<div id="bloc_Connection" >

    <?php echo validation_errors(); ?>

    <div id="login">
        <?php echo form_open("Utilisateur_Controller/connection", 'class = "form_user form-horizontal"'); ?>
        <!--<form class ="form_user form-horizontal" method="post" action=""> -->

            <h4>Connection</h4>
            <div class="control-group">
                <label class="control-label" for="pseudo">Pseudo</label>
                <div class="controls">
                    <input class="validate[required,custom[email]]" type="text" name="pseudo" placeholder="Email" value="">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="mdp">Mot de passe</label>
                <div class="controls">
                    <input class="validate[required]" type="password" id="password" placeholder="Password" name="mdp">
                </div>
            </div>


            <button class="btn btn-large btn-primary" type="submit">Valider</button>

        </form>
    </div>
</div>

<div id="bloc_Inscription" >
    <div id="login">
        <form class ="form_user form-horizontal" method="post" action="">
            <h4>Inscription</h4>

            <?php
            if(isset($error) && $error == 'unregistered') {
                echo '<span style="color : red">Vous n\'avez pas de compte</span>';
            }
            ?>

            <div class="control-group">
                <label class="control-label" for="Pseudo">Pseudo</label>
                <div class="controls">
                    <input class="validate[required]" type="text" name="pseudo" placeholder="Pseudo" value="">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input class="validate[required,custom[email]]" type="text" name="email" placeholder="Email" value="">

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="ConfirmEmail">ConfirmEmail</label>
                <div class="controls">
                    <input class="validate[required,custom[email]]" type="text" name="ConfirmEmail" placeholder="ConfirmEmail" value="">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="mdp">Mot de passe</label>
                <div class="controls">
                    <input class="validate[required]" type="password" id="password" placeholder="Password" name="mdp">

                </div>
            </div>

            <button class="btn btn-large btn-primary" type="submit">Valider</button>

        </form>
    </div>
</div>



</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>