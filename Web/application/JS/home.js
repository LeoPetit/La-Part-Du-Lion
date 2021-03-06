/**
 * Created by schliermelvin on 08/12/2017.
 */


$(function(){
// On recupere la position du bloc par rapport au haut du site
    var position_top_raccourci = $(".navbar").offset().top;

    if (window.matchMedia('(min-width: 990px)').matches) {

        $('.nav-item').addClass("btn-group dropup");
        $('.logo').removeClass("onDisplay");
        $('.navtitle').removeClass("onDisplay");
    }

    if ($(this).scrollTop() > position_top_raccourci-20) {
        $('.welcome').removeClass("center");
    }
    else{
        $('.welcome').addClass("center");
    }

//Au scroll dans la fenetre on déclenche la fonction
    $(window).scroll(function () {

//si on a defile de plus de 150px du haut vers le bas
        if ($(this).scrollTop() > position_top_raccourci-20) {

//on ajoute la classe "fixNavigation" a <div id="navigation">
            $('.navbar.navbar-expand-lg').addClass("fixNavigation");
            $('.nav-item').removeClass("btn-group dropup");
            $('.logo').addClass("onDisplay");
            $('.navtitle').addClass("onDisplay");
            $('.welcome').removeClass("center");

        } else {

//sinon on retire la classe "fixNavigation" a <div id="navigation">
            $('.navbar.navbar-expand-lg').removeClass("fixNavigation");
            $('.logo').removeClass("onDisplay");
            $('.welcome').addClass("center");

            if (window.matchMedia('(min-width: 1000px)').matches) {
                $('.navtitle').removeClass("onDisplay");
                $('.nav-item').addClass("btn-group dropup");

            }
        }
    });
});