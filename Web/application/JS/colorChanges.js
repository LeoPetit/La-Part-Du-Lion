/**
 * Created by leo on 07/12/17.
 */

var urlAjax = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var imageUrl = "http://localhost/projet_licence/La-Part-Du-Lion/divers/images/logos/png/" ;

$(document).ready(function () {
    var couleur = $("#couleurUtilisateur").val();

    switch(couleur) {
        case "#36003A" :
            imageUrl += "logo_technomanciens.png";
            break;
        case "#88035C" :
            imageUrl += "logo_exilés.png";
            break;
        case "#02A6B5" :
            imageUrl += "logo_resistants.png";
            break;
        case "#067E00" :
            imageUrl += "logo_tour.png";
            break;
        case "#D07700" :
            imageUrl += "logo_forteresse.png";
            break;
        case "#012943" :
            imageUrl += "logo_negociants.png";
            break;
        case "#A20010" :
            imageUrl += "logo_redstones.png";
            break;
    }

    $("#imageClan").attr("src", imageUrl);
    $(".navbar").css("background-color", couleur);
    $(".controlMap").css("background-color", couleur);
    $(".elemClan").css("background-color", couleur);
});