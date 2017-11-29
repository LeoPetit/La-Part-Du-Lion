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
    <?php include("/../Nav/header.php") ?>
<?php include("/../Nav/navbar.php") ?>


</head>


<body>


<div id="bloc_Connection" >

    <div id="login">
        <form class ="form_user form-horizontal" method="post" action="">
            <h4>Connection</h4>
            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input class="validate[required,custom[email]]" type="text" name="id" placeholder="Email" value="">

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="mdp">Mot de passe</label>
                <div class="controls">
                    <input class="validate[required]" type="password" id="inputPassword" placeholder="Password" name="mdp">

                </div>
            </div>

            <button class="btn btn-large btn-primary" type="submit">Valider</button>

        </form>

</div>



</body>

<footer>
    <?php include("/../Nav/footer.php") ?>
</footer>

</html>