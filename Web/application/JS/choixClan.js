/**
 * Created by leo on 01/12/17.
 */


$('#validationButton').prop("disabled",true);

$("p").each(function() {
    $(this).hide();
});

$("input[id*='clan']").click(function() {
    $("p").each(function() {
        $(this).hide();
    });

    var id = $(this).attr("id").slice(4);
    $("#content"+id).show();
    $('#validationButton').prop("disabled",false);
});

$("footer").each(function() {
    $(this).hide();
});