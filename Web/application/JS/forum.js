/**
 * Created by schliermelvin on 01/02/2018.
 */

var url = "http://localhost/projet_licence/La-Part-Du-Lion/Web/index.php/";
//var url = "http://www.partdulion.fr/index.php/";


$(document).ready(function () {

    $('form#topics').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: url+"Topic_Controller/addSubject",
            data: $(this).serialize()
        }).done(function() {

            //var obj_retour = JSON.parse(data_return);

            location.reload();
        });
    });

    $('form#forum').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: url+"Commentaire_Controller/addComment",
            data: $(this).serialize()
        }).done(function(data) {

            location.reload();
        });
    });

    $('form#searchTopic').on('change', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: url+"Topic_Controller/searchTopic",
            data: $(this).serialize()
        }).done(function(data) {

            location.reload();
        });
    });
});