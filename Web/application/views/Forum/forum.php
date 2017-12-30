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
    <?php $this->load->view('Nav/header.php') ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/CSS/forum.css">
    <?php $this->load->view('Nav/navbar.php') ?>
</head>


<body>
<div class="listAnswers container">
    <p id="subject"> Sujet : Comment ça marche ? </p>
    <div class="interactZone">
        <?php echo anchor('Forum_Controller/subject#answerPost', 'Répondre', 'id="createAnswer" class="forumButton"') ?>
        <?php echo anchor('Forum_Controller/index#newTopic', 'Nouveau sujet', 'id="createTopics" class="forumButton"') ?>
        <?php echo anchor('Forum_Controller/index', 'liste des sujets', 'id="listTopics" class="forumButton"') ?>
    </div>

    <div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">Jean-didier90</p>
            <p id="date">30/12/2017</p>
        </div>
        <p id="content">Bonjour tout le monde, c'est Squeezie :) </p>
    </div>

    <div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">Jean-didier90</p>
            <p id="date">30/12/2017</p>
        </div>
        <p id="content">Bonjour tout le monde, c'est Squeezie :) </p>
    </div>

    <div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">Jean-didier90</p>
            <p id="date">30/12/2017</p>
        </div>
        <p id="content">Bonjour tout le monde, c'est Squeezie :) </p>
    </div>

    <div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">Jean-didier90</p>
            <p id="date">30/12/2017</p>
        </div>
        <p id="content">Bonjour tout le monde, c'est Squeezie :) </p>
    </div>

    <div class="answer">
        <div class="answerAuthor">
            <p id="pseudo">Jean-didier90</p>
            <p id="date">30/12/2017</p>
        </div>
        <p id="content">Bonjour tout le monde, c'est Squeezie :) </p>
    </div>

    <?php echo form_open("Forum_Controller/subject", 'class = "form_topic"'); ?>

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

</html>
