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
    <div class="listTopics container">
        <h1> Topics </h1>

        <div class="interactZone">
            <?php echo anchor('Forum_Controller/index#newTopic', 'Nouveau sujet', 'id="createTopics" class="forumButton"') ?>
            <select>
                <option value="Général">
                    <?php echo anchor('Forum_Controller/index', 'Général', '') ?>
                </option>
                <option value="Clan">
                    <?php echo anchor('Welcome', 'Clan', '') ?>
                </option>
            </select>
        </div>

        <?php echo anchor('Forum_Controller/subject',
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
        <?php echo anchor('Forum_Controller/subject',
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
        <?php echo anchor('Forum_Controller/subject',
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
        <?php echo anchor('Forum_Controller/subject',
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
        <?php echo form_open("Forum_Controller/subject", 'class = "form_topic"'); ?>

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
