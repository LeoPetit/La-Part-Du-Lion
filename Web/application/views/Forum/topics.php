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

        <?php echo anchor('Forum_Controller/subject',
    ' <div class="topic col-lg-10">
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
            ' <div class="topic col-lg-10">
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
            ' <div class="topic col-lg-10">
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
            ' <div class="topic col-lg-10">
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

    </div>
</body>

<footer>
    <?php $this->load->view('Nav/footer.php') ?>
</footer>

</html>
