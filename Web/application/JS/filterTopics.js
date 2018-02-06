/**
 * Created by schliermelvin on 25/01/2018.
 */

$(document).ready(function () {
    var href = location.href.split('/')[7].split('_')[0];
    //var href = location.href.split('/')[4].split('_')[0];

    var subjects = [];
    var i = 0;
    $('.name').each(function () {
        subjects[i] = $(this).html();
        i++;
    });

    $( "#searchTopic" ).autocomplete({
        minLength: 0,
        source: subjects,
        focus: function( event, ui ) {
            $( "#searchTopic" ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {

            return false;
        }
    });

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