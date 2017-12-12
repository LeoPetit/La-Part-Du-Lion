/**
 * Created by schliermelvin on 08/12/2017.
 */

$(function(){
    var position_top_raccourci = $(".navbar").offset().top;

    $('.logo').addClass("onDisplay");
    $('.navtitle').addClass("onDisplay");

    if (window.matchMedia('(max-width: 990px)').matches) {

        $('.navbar').addClass("fixed-top");
    }

});


$(function() {
    $('#presentationButton').on('click', function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
        return false;
    });
});

