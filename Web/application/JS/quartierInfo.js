/**
 * Created by leo on 08/12/17.
 */
var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var polygonId;

$(document).ready(function() {

    $("#infoQuartier").on("hidden.bs.modal", function () {
        $('#plusInfo').show();
        $('#plusInfoDiv').html("");
        $('#plusInfoDivClassement').html("");

    });
    $("#plusInfo").on("click", function(e){
        $.ajax({
            type : 'POST',
            url: url + "Quartier_Controller/info/",
            dataType: 'json',
            data : {
                'polygonId' : polygonId
            },
            success: function(data) {
                quartier = data;
                $('#plusInfoDiv').html("<h6>Revenus par heure : "+ quartier[0].revenus+"</h6>");

                $('#plusInfo').hide();
            },
            error : function(e) {
                console.log(e);
            }
        });

        $.ajax({
            type : 'POST',
            url: url + "PointEquipe_Controller/classement/",
            dataType: 'json',
            data : {
                'polygonId' : polygonId
            },
            success: function(data) {
                classement = data;
                var affichage ="";
                for( var i =0; i<classement.length; i++)
                {
                    affichage += classement[i].nomClan +" : "+classement[i].nbpoints+" points <br>"
                }
                $('#plusInfoDivClassement').html(
                    affichage
                );
            },
            error : function(e) {
                console.log(e);
            }
        });
    });
});