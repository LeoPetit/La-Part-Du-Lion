/**
 * Created by schliermelvin on 25/01/2018.
 */

$(document).ready(function () {
    var href = location.href.split('/')[7].split('_')[0];
    //var href = location.href.split('/')[4].split('_')[0];

    var subjects = [];
    var i = 0;
    $('.name span').each(function () {
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
        open: function( event, ui ) {
            var param = $("#searchTopic").val();
            if($( "#searchTopic" ).val() != ""){
                $('.topic').hide();
                if($('select option:selected').html() == "Clan"){
                    console.log('test');
                    if($("span:contains('"+param+"')").parent().parent().attr('id') == "clan") {
                        $("span:contains('" + param + "')").parent().parent().show();
                    }
                }
                else{
                    if($("span:contains('"+param+"')").parent().parent().attr('id') == "general") {
                        $("span:contains('" + param + "')").parent().parent().show();
                    }
                }
                return false;
            }
            else{
                if($('option:selected').html() == "Clan"){
                    $('div#clan').show();
                    $('div#general').hide();
                }
                else {
                    $('div#clan').hide();
                    $('div#general').show();
                }
            }

        }
    });

    $('div#clan').hide();
    $('div#general').show();

    $('select').change(function () {
        if(href==="Topic") {
            if($('option:selected').html() == "Clan"){
                $( "#searchTopic" ).val("");
                $('div#clan').show();
                $('div#general').hide();
            }
            else {
                $( "#searchTopic" ).val("");
                $('div#clan').hide();
                $('div#general').show();
            }
        }
    })
});