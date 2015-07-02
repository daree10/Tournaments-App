$(document).ready(function () {
    $("#categorySearch").keyup(function () {
        getKategorije("kategorija", $("#categorySearch").val());
    });
});

function getKategorije(tablica, naziv)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    tableName: tablica,
                    fieldNaziv: naziv
                },
        success: function (json)
        {

            var dodati = "";
            $.each(json, function (key, val)
            {
                dodati += "<div class = category>";
                dodati += "<div><a href='javascript:deleteCategory(" + val.id + ")'><span class='ui-icon ui-icon-trash' style='float:left;cursor:pointer;'></span></a>" + val.naziv + "</div>";
                dodati += "<br>";
                dodati += "<div><span class='ui-icon ui-icon-flag' style='float:left;'></span><a href='javascript:showDialog(" + val.id + ")'>Pogledaj moderatore</a></div>";
                dodati += "</div>";

                getModerator(val.id, val.naziv);
            });

            $("#kat").html(dodati);
        },
        error: function () {
        }
    });
}
function getModerator(kategorija, naziv)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idKategorija: kategorija
                },
        success: function (json)
        {
            var dodati = $("#dialogSpace").html();
            dodati += "<div id='dialog" + kategorija + "' title='Moderatori kategorije " + naziv + "'>";
            $.each(json, function (key, val)
            {
                if (val.id !== 0) {
                    dodati += "<a href='javascript:deleteMod(" + kategorija + "," + val.id + ")'><span class='ui-icon ui-icon-trash' style='float:left;cursor:pointer;'></span></a><a href='http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/detalji_korisnika.php?kor=" + val.id + "'><img src=" + val.url_slika + " style='float:left;height: 20px;width:20px'/></a>" + val.korime + "<br><br>";
                }
                else {
                    dodati += "<a href='#'>Kategorija još nema moderatora!</a><br>";
                }
            });
            dodati += "</div>";
            $("#dialogSpace").html(dodati);
        },
        error: function () {
        }
    });
}

function addCategoryAJAX(categoryToAdd)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/addTurniriAPI.php",
        context: document.body,
        type: "POST",
        data:
                {
                    categoryName: categoryToAdd
                },
        success: function () {
            getKategorije("kategorija", "");
        },
        error: function () {
        }
    });
}

function deleteCategoryAJAX(categoryToDelete)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/addTurniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    categoryIdDelete: categoryToDelete
                },
        success: function (json) {
            getKategorije("kategorija", "");
            $.each(json, function (key, val)
            {
                if (val == "false") {
                    alert("Nije moguće izbrisati kategoriju! (Kategorija se koristi)");
                }
            });
        },
        error: function () {
        }
    });
}

function getKategorijaByMod(idMod, fieldVal)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idKor: idMod,
                    field: fieldVal
                },
        success: function (json) {
            var dodati = "<option value='' selected>Odaberite kategoriju...</option>";
            $.each(json, function (key, val)
            {
                if (val.id != 0) {
                    dodati += "<option value='" + val.id + "'>" + val.naziv + "</option>";
                }
            });

            if (fieldVal == "") {
                $("#modKat").html(dodati);
            }
            else {
                $("#kategorija").html(dodati);
            }

        },
        error: function () {
        }
    });
}

function deleteModCategoryAJAX(idKategorija, idMod)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/addTurniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idKategorija: idKategorija,
                    idMod: idMod
                },
        success: function (json) {
            location.reload();
        },
        error: function () {
        }
    });
}

/*
 * 
 * Turniri
 * 
 */
function getTurniriAJAX(idKategorija, idKorisnik)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPIv2.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idKategorija: idKategorija,
                    idMod: idKorisnik
                },
        success: function (json) {
            var dodati = "";
            $.each(json, function (key, val)
            {
                dodati += "<section class=tournament>";
                if (val.id != 0)
                {

                    dodati += "<label for='naziv'>Naziv</label><input onchange='turniriCRUDAjax(1,this.value,"+val.id+");' type='text' name='naziv' id='naziv"+val.id+"' value='" + val.naziv + "'><br>";
                    dodati += "<label for='pravila'>Pravila</label><input onchange='turniriCRUDAjax(2,this.value,"+val.id+");' type='text' name='pravila' id='pravila"+val.id+"' value='" + val.pravila + "'><br>";
                    dodati += "<label for='maxnatj'>Max natjecatelja</label><input onchange='turniriCRUDAjax(3,this.value,"+val.id+");' type='number' name='maxnatj' id='maxnatj"+val.id+"' value='" + val.maxnatjecatelja + "'><br>";
                    dodati += "<label for='datum_pocetka'>Datum početka</label><input onchange='turniriCRUDAjax(4,this.value,"+val.id+");' type='date' name='datum_pocetka' id='datum_pocetka"+val.id+"' value='" + val.datum_pocetka + "'><br>";
                    dodati += "<label for='timpobj'>Tim pobjednik</label><input type='text' name='timpobj' id='timpobj'";
                    if (val.tim_pobjednik_id === null) {
                        dodati += "value='Natjecanje nema pobjednika još!' readonly><br>";
                        dodati += "<a href='javascript:showTeams(" + val.id + ")'>Proglasi pobjednika!</a>";
                    }
                    else {
                        dodati += "value='" + val.tim_pobjednik_id + "' readonly><br>";
                    }
                    getTimoviByIdTurnir(val.id);

                }
                else
                {
                    dodati += "Još niste kreirali turnir pod tom kategorijom!";
                }
                dodati += "</section>";
            });
            $("#turniri").html(dodati);
        },
        error: function () {
        }
    });
}
function getTimoviByIdTurnir(idTurnir)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPIv2.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTournament: idTurnir,
                    active: "true"
                },
        success: function (json)
        {
            var dodati = $("#dialogSpace").html();
            dodati += "<div id='dialog" + idTurnir + "' title='Timovi turnira'>";
            $.each(json, function (key, val)
            {
                if (val.id != 0) {
                    dodati += "<a href='javascript:winTournament(" + idTurnir + "," + val.id + ")'><span class='ui-icon ui-icon-star' style='float:left;cursor:pointer;'></span></a><a target='_blank' href='timovi.php?idTim=" + val.id + "'>" + val.nazivtima + "</a><br>";
                }
                else {
                    dodati += "<a href='#'>Turnir nema prihvaćenih timova!</a><br>";
                }
            });
            dodati += "</div>";
            $("#dialogSpace").html(dodati);
        },
        error: function () {
        }
    });
}
/*
 * 
 * Nereg korisnik i reg korisnik
 * 
 */
function getKategorija()
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    tableName: 'kategorija',
                    fieldNaziv: ''
                },
        success: function (json)
        {
            var dodati = "<option value='' selected>Sve kategorije</option>";
            $.each(json, function (key, val)
            {
                if (val.id != 0) {
                    dodati += "<option value='" + val.id + "'>" + val.naziv + "</option>";
                }
            });
            
                $("#kategorija").html(dodati);
        },
        error: function () {
        }
    });
}
function getTurniriAJAXreg(idKat)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPI.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    tableName: 'turniri',
                    fieldNaziv: '',
                    idKatTurnir: idKat
                },
        success: function (json)
        {
            var dodati = "";
            $.each(json, function (key, val)
            {
                dodati += "<section class=tournament>";
                if (val.id != 0)
                {

                    dodati += "<label class = 'skrivenozanereg' for='naziv'>Naziv</label><input type='text' name='naziv' id='naziv' value='" + val.naziv + "' readonly><br>";
                    dodati += "<div class = 'skrivenozanereg'>";
                    dodati += "<label for='pravila'>Pravila</label><input type='text' name='pravila' id='pravila' value='" + val.pravila + "' readonly><br>";
                    dodati += "<label for='maxnatj'>Max natjecatelja</label><input type='text' name='maxnatj' id='maxnatj' value='" + val.maxnatjecatelja + "' readonly><br>";
                    dodati += "<label for='datum_pocetka'>Datum početka</label><input type='date' name='datum_pocetka' id='datum_pocetka' value='" + val.datum_pocetka + "' readonly><br>";
                    dodati += "</div>";
                    dodati += "<a href='javascript:showTeams("+val.id+")'>Vidi timove!</a><br>";
                    dodati += "<a class='skrivenozanereg' href='prijaviTim.php?idTurnir="+val.id+"'>Prijavi se!</a>";
                    getTimoviByIdTurnirReg(val.id);

                }
                else
                {
                    dodati += "Još nema turnira pod tom kategorijom!";
                }
                dodati += "</section>";
            });
            $("#turniri").html(dodati);
        },
        error: function () {
        }
    });
}
function getTimoviByIdTurnirReg(idTurnir)
{
    $.ajax({
        url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriAPIv2.php",
        context: document.body,
        dataType: "json",
        type: "POST",
        data:
                {
                    idTournament: idTurnir,
                    active: "true"
                },
        success: function (json)
        {
            var dodati = $("#dialogSpace").html();
            dodati += "<div id='dialog" + idTurnir + "' title='Timovi turnira'>";
            $.each(json, function (key, val)
            {
                if (val.id != 0) {
                    dodati += "<a target='_blank' class='skrivenozanereg' href='timovi.php?idTim=" + val.id + "'>" + val.nazivtima + "</a><br>";
                    dodati += "<b class='skrivenozareg'>" + val.nazivtima + "</b><br>";
                    dodati += val.opistima+"<br><br>";
                }
                else {
                    dodati += "<a href='#'>Turnir nema prihvaćenih timova!</a><br>";
                }
            });
            dodati += "</div>";
            $("#dialogSpace").html(dodati);
        },
        error: function () {
        }
    });
}