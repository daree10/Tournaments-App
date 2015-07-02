$(document).ready(function () {
    $("#userNameSearch").keyup(function () {
        getKorisnici("", "korime", "", $("#userNameSearch").val());
    });
});

function getKorisnici(sort, fName, fVal, search)
{

    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/usersAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    orderBy: sort,
                    fieldName: fName,
                    fieldVal: fVal,
                    lookBy: search
                },
        success: function (json)
        {
            //var dodati = "<label for='userNameSearch'>Pretraga po korisničkom imenu: </label><input type='text' name='korime' id='userNameSearch' size='15' maxlength='50'><br>";
            var dodati = "<table>";
            dodati += "<thead>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(2)'>Korisničko ime</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(3)'>Ime</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(4)'>Prezime</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(5)'>Email</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(6)'>Lozinka</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(7)'>Grad</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(8)'>Županija</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(9)'>Datum rođenja</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(10)'>Spol</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(11)'>Datum registracije</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(12)'>Datum zadnjeg pristupa</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(13)'>Tip korisnika</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "<a class='headerLink' href='javascript:getKorisnici(15)'>Status korisnika</a>";
            dodati += "</th>";
            dodati += "<th>";
            dodati += "Aktivacijski kod";
            dodati += "</th>";
//            dodati += "<th>";
//            dodati += "Brisanje";
//            dodati += "</th>";
            dodati += "</thead>";
            dodati += "<tbody>";

            $.each(json, function (key, val)
            {
                dodati += "<tr>";
                dodati += "<td>";
                dodati += "<a href='http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/detalji_korisnika.php?kor=" + val.id + "'><img src="+ val.url_slika +" style='height: 50px;width:50px'/></a><br>" + val.korime;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.ime;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.prezime;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.email;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.lozinka;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.grad;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.zupanija;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.datum_rodjenja;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.spol;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.datum_registracije;
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.datum_zadnjeg_pristupa;
                dodati += "</td>";
                dodati += "<td>";
                switch(val.tip_korisnika_id)
                {
                    case "1":
                        dodati += "obični";
                        break;
                    case "2":
                        dodati += "mod";
                        break;
                    case "3":
                        dodati += "admin";
                        break;
                }
                dodati += "</td>";
                dodati += "<td>";
                switch(val.status_korisnika_id)
                {
                    case "1":
                        dodati += "aktivan";
                        break;
                    case "2":
                        dodati += "blokiran";
                        break;
                    case "3":
                        dodati += "nije potvrdio email";
                        break;
                }
                dodati += "</td>";
                dodati += "<td>";
                dodati += val.aktivacijski_kod;
                dodati += "</td>";
//                dodati += "<td>";
//                if (val.tip_korisnika_id != 3) {
//                    dodati += "<a href='popis_korisnika.php?delete=" + val.id + "' class='confirmation'><span class='ui-icon ui-icon-trash'></span></a>";
//                }
//                else {
//                    dodati += "<span style='cursor: not-allowed;' class='ui-icon ui-icon-cancel'></span>";
//                }
//                dodati += "</td>";
                dodati += "</tr>";

            });
            dodati += "</tbody>";
            dodati += "</table>";

            $("#tablica").html(dodati);
        },
        error: function () {
        }
    });
}