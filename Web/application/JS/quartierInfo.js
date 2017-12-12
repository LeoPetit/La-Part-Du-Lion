/**
 * Created by leo on 08/12/17.
 */
var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
var polygonId;

$(document).ready(function() {

    $("#infoQuartier").on("hidden.bs.modal", function () {
        $('#plusInfo').show();
        $("#chartContainerInfo").html("");
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

                var colors = [];
                for(var k=0;k<classement.length;k++) {
                    colors.push(classement[k].couleur);
                }

                CanvasJS.addColorSet("customColors", colors);

                var chartInfo = new CanvasJS.Chart("chartContainerInfo", {colorSet: "customColors"});

                chartInfo.options.title = { text: "Classement" };

                chartInfo.options.data = [];
                chartInfo.options.data.push({dataPoints: []});

                for(var i=0;i<classement.length;i++) {
                    chartInfo.options.data[0].dataPoints.push({label: classement[i].nomClan, y: parseInt(classement[i].nbpoints)});
                }

                chartInfo.render();
            },
            error : function(e) {
                console.log(e);
            }
        });
    });
});