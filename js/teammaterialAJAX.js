function getVidsAJAX(idTim)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/getMaterialAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTeam: idTim,
                    materialType: 1
                },
        success: function (json)
        {

            var dodati = "";
            if (json.url == "null")
            {
                dodati += "<div class = category>";
                dodati += "Tim nema postavljenih videa!";
                dodati += "</div>";
            }
            else
            {
                $.each(json, function (key, val)
                {


                    dodati += "<div class = category>";
                    dodati += "<video width='400' controls>";
                    dodati += "<source src='" + val.url + "'>";
                    dodati += "</video>";
                    dodati += "</div>";

                });
            }


            $("#video").html(dodati);
        },
        error: function () {
        }
    });
}
function getPicsAJAX(idTim)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/getMaterialAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTeam: idTim,
                    materialType: 2
                },
        success: function (json)
        {
            var dodati = "";
            if (json.url == "null")
            {
                dodati += "<div class = category>";
                dodati += "Tim nema postavljenih slika!";
                dodati += "</div>";
            }
            else {
                dodati += "<div class='gallery' align='center'>";
                dodati += "<h3>Slike</h3>";
                dodati += "<div class='thumbnails'>";
                var imgUrl = "";
                $.each(json, function (key, val)
                {
                    dodati += "<img onmouseover='preview.src=img"+val.id+".src' name='img"+val.id+"' src='" + val.url + "'/>";
                    imgUrl = val.url;
                    
                });
                dodati += "</div>";
                dodati += "<div class='preview' align ='center'>";
                dodati += "<img name='preview' src='"+imgUrl+"'/>";
                dodati += "</div>";
                dodati += "</div>";

            }
            $("#slike").html(dodati);
        },
        error: function () {
        }
    });
}
function getDocsAJAX(idTim)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/getMaterialAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTeam: idTim,
                    materialType: 3
                },
        success: function (json)
        {

            var dodati = "";

            if (json.url == "null")
            {
                dodati += "<div class = category>";
                dodati += "Tim nema postavljenih dokumenata!";
                dodati += "</div>";
            }
            else
            {
                var broja = 1;
                $.each(json, function (key, val)
                {


                    dodati += "<div class = category>";
                    dodati += "<a href='" + val.url + "'>Dokument #" + broja + "</a>";
                    dodati += "</div>";

                    broja++;
                });
            }


            $("#doc").html(dodati);
        },
        error: function () {
        }
    });
}
function getCommentsAJAX(idTim)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/getMaterialAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTeam: idTim,
                    materialType: 4
                },
        success: function (json)
        {

            var dodati = "";

            if (json.url == "null")
            {
                dodati += "<div class = category>";
                dodati += "Nema komentara!";
                dodati += "</div>";
            }
            else
            {
                $.each(json, function (key, val)
                {

                    dodati += "<div class = category>";
                    dodati += "<label for='komentar'>"+val.korime+"</label>";
                    dodati += "<textarea name='komentar' id='komentar' cols=50 readonly>"+val.komentar+"</textarea>";
                    dodati += "<br>"+val.vrijeme;
                    dodati += "</div>";

                });
            }


            $("#commentSection").html(dodati);
        },
        error: function () {
        }
    });
}
