/**
 * Created by leo on 25/02/18.
 */

var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";

$(document).ready(function () {

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

    console.log(competences);

    config = {
        container: "#tree-simple"
    };

    parent_node = {
        text: { name: "Competence" }
    };

    simple_chart_config = [
        config, parent_node
    ];

    var childs = [];
    var node;

    for(var i=0; i<competences.length;i++) {

        if(competences[i].competence_parent != null) {
            node = {
                parent: childs[i-1],
                text: { name: competences[i].text }
            };
        } else {
            node = {
                parent: simple_chart_config[1],
                text: { name: competences[i].text }
            };
        }

        childs.push(node);

        simple_chart_config.push(childs[i]);
    }

    var my_chart = new Treant(simple_chart_config);
});



