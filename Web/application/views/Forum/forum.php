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

<div class="listAnswers container">
    <?php echo '<p id="subject"> Sujet : '.$subject->sujet.'  </p>'?>
    <div class="interactZone">
        <?php echo anchor('Topic_Controller/subject#answerPost', 'Répondre', 'id="createAnswer" class="forumButton"') ?>
        <?php echo anchor('Topic_Controller/index#newTopic', 'Nouveau sujet', 'id="createTopics" class="forumButton"') ?>
        <?php echo anchor('Topic_Controller/index', 'liste des sujets', 'id="listTopics" class="forumButton"') ?>
    </div>

    <?php foreach ($commentaires as $comment){
    echo '<div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">'.$comment->pseudo.'</p>
            <p id="date">'.$comment->datePoste.'</p>
        </div>
        <p id="content">'.$comment->contenu.'</p>
    </div>';
    }
    ?>

    <?php echo
        form_open("Commentaire_Controller/addComment", 'class = "form_topic"');
        echo form_hidden('idSubject', $subject->id);
    ?>


    <h4 id="subject">Répondre</h4>
        <div class="control-group">
            <?php

            $attributes = array(
                'class' => 'control-label',
            );

            $data = array(
                'name'          => 'answer',
                'id'            => 'answerPost',
                'class'         => 'inputData',
                'type'          => 'textArea',
                'value'         => '',
                'placeholder' => 'Votre réponse',
            );

            echo form_textarea($data);

            $data = array(
                'id'            =>'validPost',
                'name'          => 'validerPost',
                'class'         => 'validPost',
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
