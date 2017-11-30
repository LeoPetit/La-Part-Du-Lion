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

<div class="container">
    <div class="row col-lg-10">
        <div class="col-lg-5">
            <div id="bloc_Connection" >
                <?php echo validation_errors(); ?>

                <?php echo form_open("Utilisateur_Controller/connection", 'class = "form_user"'); ?>
                <!--<form class ="form_user form-horizontal" method="post" action=""> -->

                <h4>Connection</h4>
                <div class="control-group">
                        <label class="control-label" for="pseudo">Pseudo</label>
                    <div>
                        <?php
                        $data = array(
                            'name'          => 'pseudo',
                            'id'            => 'pseudo',
                            'class'         => 'imputPseudo',
                            'type'          => 'text',
                            'value'         => '',
                            'placeholder' => 'pseudo',
                        );

                        echo form_input($data);
                        ?>
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="Password">Mote de passe</label>
                    <div>
                        <?php
                        $data = array(
                            'name'          => 'Password',
                            'id'            => 'Password',
                            'class'         => 'imputPassword',
                            'type'          => 'password',
                            'value'         => '',
                            'placeholder' => 'Mot de passe',
                        );

                        echo form_input($data);

                        ?>
                    </div>
                    <div>
                        <?php echo form_submit('validerConnexion', 'Valider'); ?>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-5">
            <div id="bloc_Inscription" >
                <div id="register">
                    <?php echo form_open("Utilisateur_Controller/enregistrement", 'class = "form_user"'); ?>
                        <h4>Inscription</h4>

                        <?php
                        if(isset($error) && $error == 'unregistered') {
                            echo '<span style="color : red">Vous n\'avez pas de compte</span>';
                        } ?>

                        <div class="control-group">
                            <label class="control-label" for="pseudo">Pseudo</label>
                            <div>
                                <?php
                                $data = array(
                                    'name'          => 'pseudo',
                                    'id'            => 'pseudo',
                                    'class'         => 'imputPseudo',
                                    'type'          => 'text',
                                    'value'         => '',
                                    'placeholder' => 'pseudo',
                                );

                                echo form_input($data);
                                ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="Mail">E-mail</label>
                            <div>
                                <?php
                                $data = array(
                                    'name'          => 'Mail',
                                    'id'            => 'Mail',
                                    'class'         => 'imputMail',
                                    'type'          => 'text',
                                    'value'         => '',
                                    'placeholder' => 'Mail',
                                );

                                echo form_input($data);
                                ?>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="password">Mot de passe</label>
                            <div>
                                <?php
                                $data = array(
                                    'name'          => 'password',
                                    'id'            => 'password',
                                    'class'         => 'imputPassword',
                                    'type'          => 'password',
                                    'value'         => '',
                                    'placeholder' => 'Mot de passe',
                                );

                                echo form_input($data);
                                ?>
                            </div>
                        </div>


                    <div>
                        <?php echo form_submit('validerEnregistrement', 'Valider'); ?>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>