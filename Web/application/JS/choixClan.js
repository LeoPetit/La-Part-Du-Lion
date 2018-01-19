/**
 * Created by leo on 01/12/17.
 */


$('#validationButton').prop("disabled",true);

$("footer").each(function() {
    $(this).hide();
});

$("li[id*='idClan']").click(function(){
    var id = $(this).attr("id").slice(5);
    if($($(this).attr("id") + " > div.animatedItem").has('.open')){
        $($(this).attr("id") + " > div.animatedItem").slideDown('slow', function() {
            $(this).removeClass('open');
        });
    }
    else {
        $($(this).attr("id") + " > div.animatedItem").slideDown('slow', function(){
            $(this).addClass('open');
        });
    }
});

$("label.control-labelCheckBox").click(function(){
    if($(this).hasClass('.test')){
        $(this).css("background-color", "black");
        $(this).removeClass('.test');
    }
    else{
        $(this).css("background-color", "#13EA00");
        $(this).addClass('.test');
    }
});

