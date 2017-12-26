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
    <title>Part du Lion</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>application/CSS/connection.css">
    <?php $this->load->view('Nav/header.php') ?>
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>

<div class="container">
    <div class="form row col-md-10">

        <?php echo '<span class="spanError">'.validation_errors()."</span>"; ?>
        <?php
        if(isset($error) && $error == 'unregistered') {
            echo '<span class="spanError">Vous n\'avez pas de compte</span>';
        } ?>
        <img class="backLogo" src="<?php echo base_url()?>application/assets/images/logos/png/logo.png" />
        <div class="col-md-6">
            <div id="bloc_Connection" >

                <?php echo form_open("Utilisateur_Controller/connection", 'class = "form_user"'); ?>

                    <h4>Se connecter</h4>
                    <div class="control-group">
                        <?php

                        $attributes = array(
                            'class' => 'control-label',
                        );

                        echo form_label('Pseudo', 'pseudo', $attributes);
                        $data = array(
                            'name'          => 'pseudo',
                            'id'            => 'pseudo',
                            'class'         => 'inputData',
                            'type'          => 'text',
                            'value'         => '',
                            'placeholder' => 'pseudo',
                        );

                        echo form_input($data);

                        $attributes = array(
                            'class' => 'control-label',
                        );

                        echo form_label('Mot de passe', 'password', $attributes);

                        $data = array(
                            'name'          => 'Password',
                            'id'            => 'Password',
                            'class'         => 'inputData',
                            'type'          => 'password',
                            'value'         => '',
                            'placeholder' => 'Mot de passe',
                        );

                        echo form_input($data);

                        $data = array(
                            'name'          => 'validerConnexion',
                            'class'         => 'validConnexion',
                            'value'         => 'Se connecter',
                        );

                        echo form_submit($data);
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div id="bloc_Inscription" >
                <div id="register">
                    <?php echo form_open("Utilisateur_Controller/preEnregistrement", 'class = "form_user"'); ?>
                        <h4>S'inscrire</h4>

                        <div class="control-group">
                            <div>
                                <?php
                                    $attributes = array(
                                        'class' => 'control-label',
                                    );

                                    echo form_label('Pseudo', 'pseudo', $attributes);

                                    $data = array(
                                        'name'          => 'pseudo',
                                        'id'            => 'pseudo',
                                        'class'         => 'inputData',
                                        'type'          => 'text',
                                        'value'         => '',
                                        'placeholder' => 'pseudo',
                                    );

                                    echo form_input($data);

                                    $attributes = array(
                                        'class' => 'control-label',
                                    );

                                    echo form_label('Mail', 'mail', $attributes);

                                    $data = array(
                                        'name'          => 'Mail',
                                        'id'            => 'Mail',
                                        'class'         => 'inputData',
                                        'type'          => 'text',
                                        'value'         => '',
                                        'placeholder' => 'Mail',
                                    );

                                    echo form_input($data);

                                    $attributes = array(
                                        'class' => 'control-label',
                                    );

                                    echo form_label('Mot de passe', 'password', $attributes);

                                    $data = array(
                                        'name'          => 'password',
                                        'id'            => 'password',
                                        'class'         => 'inputData',
                                        'type'          => 'password',
                                        'value'         => '',
                                        'placeholder' => 'Mot de passe',
                                    );

                                    echo form_input($data);
                                ?>
                            </div>
                            <div>
                                <?php
                                    $data = array(
                                        'name'          => 'validerEnregistrement',
                                        'class'         => 'validRegister',
                                        'value'         => 'Choisir un clan',
                                    );

                                    echo form_submit($data);
                                ?>
                            </div>
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