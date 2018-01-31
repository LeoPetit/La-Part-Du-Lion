/**
 * Created by schliermelvin on 25/01/2018.
 */


var urlAjax = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var imageUrl = "http://localhost/projet_licence/La-Part-Du-Lion/Web/application/assets/images/logos/png/" ;

$(document).ready(function () {
    var href = location.href.split('/')[7].split('_')[0];

    $('div#clan').hide();
    $('div#general').show();

    $('select').change(function () {
        if(href==="Topic") {
            if($('option:selected').html() == "Clan"){
                $('div#clan').show();
                $('div#general').hide();
            }
            else {
                $('div#clan').hide();
                $('div#general').show();
            }
        }
    })
});