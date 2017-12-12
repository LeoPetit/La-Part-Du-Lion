/**
 * Created by schliermelvin on 08/12/2017.
 */

$(function(){
    var position_top_raccourci = $(".navbar.navbar-expand-lg").offset().top;

    $('.logo').addClass("onDisplay");
    $('.navtitle').addClass("onDisplay");

    if (window.matchMedia('(max-width: 1000px)').matches) {

        $('.navbar').addClass("fixed-top");
    }

});

