<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 24/10/2017
 * Time: 16:21
 */
session_start();
?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Part du Lion</title>
    <?php $this->load->view('Nav/header.php') ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/CSS/forum.css">
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>
    <?php
    if(!isset($_SESSION["utilisateur"]))
    {
        header('Location:'. base_url().'index.php/Utilisateur_Controller');
    }
    $data = array(
        'type'  => 'hidden',
        'name'  => 'couleur',
        'id'    => 'couleurUtilisateur',
        'value' => $_SESSION["utilisateur"]->couleur,
    );
    echo form_input($data);
    ?>

    <div class="listTopics container">
        <h1> Topics </h1>

        <div class="interactZone">
            <a href="#newTopic" id="createTopics" class="forumButton"> Nouveau sujet</a>
            <select id="zone">
                <option>Général</option>
                <option>Clan</option>
            </select>
        </div>

        <?php echo anchor('Commentaire_Controller/subject',
    ' <div class="topic ">
                <div class="author col-3">
                    <span>Jean-dider90</span>
                </div>
                <div class="name col-3">
                    <span>Comment ça marche ?</span>
                </div>
                <div class="message col-3">
                    <span>3<i class="fa fa-comment-o" aria-hidden="true"></i></span>
                </div>
                <div class="date col-3">
                    <span>Créé le : 28/12/17</span>
                </div>
            </div>',
            '')
        ?>

        <?php echo form_open("Commentaire_Controller/subject", 'class = "form_topic"'); ?>

        <h4 id="subject">Nouveau sujet</h4>
        <div class="control-group">
            <?php

            $data = array(
                'name'          => 'topicTitle',
                'id'            => 'newTopic',
                'class'         => 'inputData',
                'type'          => 'text',
                'value'         => '',
                'placeholder' => 'Titre du sujet',
            );

            echo form_input($data);

            $data = array(
                'name'          => 'answer',
                'id'            => 'answerPost',
                'class'         => 'inputData',
                'type'          => 'text',
                'value'         => '',
                'placeholder' => 'Votre message',
            );

            echo form_textarea($data);

            $data = array(
                'id'            => 'validPost',
                'name'          => 'validerPost',
                'class'         => 'validPost forumButton',
                'value'         => 'Poster',
            );

            echo form_submit($data);
            ?>
        </div>
        </form>

    </div>
</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

<script type="text/javascript" src="<?php echo base_url();?>application/JS/colorChanges.js"></script>


</html>
