/**
 * Created by leo on 01/12/17.
 */


$("p").each(function(index) {
    $(this).hide();
});

$("input[id*='clan']").click(function() {
    $("p").each(function(index) {
        $(this).hide();
    });

    var id = $(this).attr("id").slice(4);
    $("#content"+id).show();
});
