/**
 * Created by leo on 07/12/17.
 */

var urlAjax = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var imageUrl = "http://localhost/projet_licence/La-Part-Du-Lion/Web/application/assets/images/logos/png/" ;

$(document).ready(function () {
    var couleur = $("#couleurUtilisateur").val();
    var couleur2 = "";

    var href = location.href.split('/')[7].split('_')[0];

    switch(couleur) {
        case "#36003A" :
            imageUrl += "logo_technomanciens.png";
            couleur2 +="#66016D";
            break;
        case "#88035C" :
            imageUrl += "logo_exilés.png";
            couleur2 +="#380024";

            break;
        case "#02A6B5" :
            imageUrl += "logo_resistants.png";
            couleur2 +="#004C53";

            break;
        case "#067E00" :
            imageUrl += "logo_tour.png";
            couleur2 +="#033E00";

            break;
        case "#D07700" :
            imageUrl += "logo_forteresse.png";
            couleur2 +="#693C00";

            break;
        case "#012943" :
            imageUrl += "logo_negociants.png";
            couleur2 +="#075385";

            break;
        case "#A20010" :
            imageUrl += "logo_redstones.png";
            couleur2 +="#560008";

            break;
    }
    console.log(href);


    if(href!=="Topic" && href!=="Commentaire") {
        $("#imageClan").attr("src", imageUrl);
        $(".navbar").css("background-color", couleur);
        $(".controlMap").css("background-color", couleur);
        $(".elemClan").css("background-color", couleur);
        $(".dropdown-menu").css("background-color", couleur);
        $(".listAnswers").css("background-color", couleur2);

    }

    $('select').change(function () {
        if(href==="Topic") {
            if($('option:selected').html() == "Clan"){
                $(".navbar").css("background-color", couleur);
                $(".dropdown-menu").css("background-color", couleur);
                $("#zone").css("background-color", couleur);
                $(".listTopics").css("background-color", couleur2);
                console.log(couleur2);

            }
            else {
                $(".navbar").css("background-color", '#002572');
                $(".dropdown-menu").css("background-color", '#002572');
                $("#zone").css("background-color", '#002572');
                $(".listTopics").css("background-color", '#DDDDDD');
            }
        }
    })
});