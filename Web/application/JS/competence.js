/**
 * Created by leo on 25/02/18.
 */

var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
//var url = "http://www.partdulion.fr/index.php/";

$(document).ready(function () {

    var id;

    //alert("Cette page est en cours de développement !! Toutes le fonctionnalités ne sont pas terminées, merci d'attendre quelques jours avant de les utilsiés. Merci.");

    var competences;

    $.ajax({
        type: 'POST',
        url: url + "Competence_Controller/show",
        dataType: 'json',
        async: false,
        success: function (data) {
            competences = data;
        },
        error: function (e) {
            console.log(e);
        }
    });

    config = {
        container: "#tree-simple"
    };

    parent_node = {
        text: { name: "Competences"},
        HTMLclass: "title"
    };

    simple_chart_config = [
        config, parent_node
    ];

    var childs = [];
    var node;

    for(var i=0; i<competences.length;i++) {

        if(competences[i].competence_parent != null) {
            var classe;
            if(competences[i-1].paye == "0")
            {
                classe = "unlock";
            }
            else
            {
                classe = "lock";
            }
            node = {
                parent: childs[i-1],
                text: { name: competences[i].text },
                HTMLid: competences[i].id+"_"+competences[i].paye,
                HTMLclass: classe
            };
        } else {

            node = {
                parent: simple_chart_config[1],
                text: { name: competences[i].text },
                HTMLid: competences[i].id+"_"+competences[i].paye,
                HTMLclass: "unlock"
            };
        }

        childs.push(node);

        simple_chart_config.push(childs[i]);
    }

    var my_chart = new Treant(simple_chart_config);

    $(".node.unlock").click(function () {

        if($(this).attr('id') != null) {
            var paye = (($(this).attr('id').split('_')[1] <= 0));

            id = $(this).attr('id').split('_')[0];

            if (!paye) {

                $.ajax({
                    type: 'POST',
                    url: url + "Competence_Controller/getCompetence/" + id,
                    dataType: 'json',
                    success: function (data) {
                        var competence = data;

                        $('.modal-title').html(competence[0].nom);
                        $('#descComp').html(competence[0].description);
                        $('.modal').modal('toggle');
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
        }
    });

    $('#addGold').click(function () {
        var gold = $('#gold').val();

        $.ajax({
            type: 'POST',
            url: url + "CompetenceEquipe_Controller/addGoldToCompetence",
            data: {
                'id': id,
                'gold': gold
            },
            success: function () {
                location.reload();
            },
            error: function (e) {
                console.log(e);
            }
        });
    })

});



