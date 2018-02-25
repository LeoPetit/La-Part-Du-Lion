<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 27/10/2017
 * Time: 10:41
 */
?>

<div class="footerContent row col-lg-12">
    <div class="linksContent col-lg-6">
        <p>©2017-2018 Captain Fall'Cod ENTERTAINMENT, INC. TOUS DROITS RÉSERVÉS.
            Toutes les marques citées appartiennent à leur propriétaire.</p>
    </div>
    <div class="networks col-md-6">
        <?php echo anchor('Welcome/telecharger', 'Téléchargez La Part du Lion !', 'id="dlGame"') ?>

        <div class="networksButton">
            <?php
                echo anchor('', '<i class="fa fa-facebook fa-2x" aria-hidden="true"></i>', '');
                echo anchor('', '<i class="fa fa-twitter fa-2x" aria-hidden="true"></i>', '');
                echo anchor('', '<i class="fa fa-youtube fa-2x" aria-hidden="true"></i>', '');
            ?>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>application/libraries/jquery-3.2.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>application/JS/navbar.js"></script>

<script src="<?php echo base_url();?>application/libraries/Raphael.js"></script>
<script src="<?php echo base_url() ?>application/libraries/treant-js-master/Treant.js"></script>
