<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 24/10/2017
 * Time: 16:21
 */
if(!isset($_SESSION['utilisateur'])){
    session_start();
}
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
            <h4 id="subject">Rechercher un sujet</h4>
            <input type="text" id="searchTopic" placeholder="Rechercher votre sujet" />
        </div>


        <?php


            foreach($topics as $r){
                if(empty($r->clan_id)){
                    $class = "general";
                }
                else{
                    $class = "clan";
                }
                echo anchor('Commentaire_Controller/subject/'.$r->id.'',
                    ' <div id='.$class.' class="topic">
                <div class="author col-3">
                    <span>'.$r->pseudo.'</span>
                </div>
                <div class="name col-3">
                    <span>'.$r->sujet.'</span>
                </div>
                <div class="message col-3">
                    <span>'.$r->nbCommentaires.'<i class="fa fa-comment-o" aria-hidden="true"></i></span>
                </div>
                <div class="date col-3">
                    <span>'.$r->dateCreation.'</span>
                </div>
                </div>
            ',
                    '');

            }
        ?>

        <?php echo form_open("", 'id="topics" class = "form_topic"'); ?>

        <h4 id="subject">Nouveau sujet</h4>
        <div class="control-group">
            <?php
            $options = array(
                'general'         => 'general',
                'clan'           => 'clan',
            );

            echo form_dropdown('target', $options);


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
<script type="text/javascript" src="<?php echo base_url();?>application/JS/filterTopics.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>application/JS/forum.js"></script>


</html>
