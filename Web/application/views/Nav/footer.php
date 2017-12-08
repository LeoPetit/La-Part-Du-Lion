<?php
/**
 * Created by PhpStorm.
 * User: schliermelvin
 * Date: 27/10/2017
 * Time: 10:41
 */
?>

<script type="text/javascript" src="<?php echo base_url();?>application/libraries/jquery-3.2.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    $(function(){
// On recupere la position du bloc par rapport au haut du site
        var position_top_raccourci = $(".navbar.navbar-expand-lg").offset().top;

//Au scroll dans la fenetre on déclenche la fonction
        $(window).scroll(function () {

//si on a defile de plus de 150px du haut vers le bas
            if ($(this).scrollTop() > position_top_raccourci) {

//on ajoute la classe "fixNavigation" a <div id="navigation">
                $('.navbar.navbar-expand-lg').addClass("fixNavigation");
                $('.nav-item').removeClass("btn-group dropup");
                $('.navtitle').addClass("onDisplay");
                $('.logo').addClass("onDisplay");
            } else {

//sinon on retire la classe "fixNavigation" a <div id="navigation">
                $('.navbar.navbar-expand-lg').removeClass("fixNavigation");
                $('.nav-item').addClass("btn-group dropup");
                $('.navtitle').removeClass("onDisplay");
                $('.logo').removeClass("onDisplay");
            }
        });
    });
</script>
