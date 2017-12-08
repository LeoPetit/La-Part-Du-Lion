/**
 * Created by schliermelvin on 08/12/2017.
 */




$(function(){
    var position_top_raccourci = $(".navbar.navbar-expand-lg").offset().top;

        $('.nav-item').addClass("btn-group dropup");

    if (window.matchMedia('(max-width: 1000px)').matches) {

        $('.navbar').addClass("fixed-top");
    }

});