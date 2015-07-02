
$(document).ready(function () {
    $('input[type="submit"]').click(function () {
        if (/\w*turniri\.php/.test(location.pathname))
        {
            if (isEmpty("kategorija") || isEmpty("naziv") || isEmpty("pravila") || isEmpty("datpoc"))
            {
                event.preventDefault();
            }
        }
        else if (/\w*prijaviTim\.php\w*/.test(location.pathname))
        {
            if(isEmpty("nazivtima") || isEmpty("opistima"))
            {
                event.preventDefault();
            }
        }
    });
});

function isEmpty(fieldName)
{
    if ($("#" + fieldName).val() === "")
    {
        $("#" + fieldName).removeClass("ispravanUnos");
        $("#" + fieldName).addClass("ui-state-error");
        $("#greska").html("Sva polja su obavezna!");
        return true;
    }
    $("#" + fieldName).removeClass("ui-state-error");
    $("#" + fieldName).addClass("ispravanUnos");
    $("#greska").html("");
    return false;
}