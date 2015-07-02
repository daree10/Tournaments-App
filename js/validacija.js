if (/\w*registracija\.php/.test(location.pathname))
{
    $(document).ready(function () {

        $("#korime").keyup(function () {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/provjeraZauzece.php",
                context: document.body,
                dataType: "json",
                type: "GET",
                data:
                        {
                            fieldName: "korime",
                            fieldVal: $("#korime").val()
                        },
                success: function (json)
                {
                    $.each(json, function (key, val)
                    {
                        if (val !== 0)
                        {
                            $("#korime").removeClass("ispravanUnos");
                            $("#korime").addClass("ui-state-error");
                            $("#greska").html("Korisničko ime je zauzeto!");
                        }
                        else
                        {
                            $("#korime").removeClass("ui-state-error");
                            $("#korime").addClass("ispravanUnos");
                            $("#greska").html("");
                        }
                    });
                },
                error: function () {
                }
            });
        });
        $("#korime").blur(function () {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/provjeraZauzece.php",
                context: document.body,
                dataType: "json",
                type: "GET",
                data:
                        {
                            fieldName: "korime",
                            fieldVal: $("#korime").val()
                        },
                success: function (json)
                {
                    $.each(json, function (key, val)
                    {
                        if (val !== 0)
                        {
                            $("#korime").focus();
                        }
                    });
                },
                error: function () {
                }
            });
        });

        $("#lozinka").keyup(function () {
            if (!provjeraLozinke())
            {
                $("#greska").html("Lozinka mora imati najmanje 6 znakova, sadržavati malo slovo, veliko slovo i broj");
            }
            else
            {
                $("#greska").html("");
            }
        });
        $("#lozinka").blur(podudaranjeLozinki);
        $("#lozinka2").blur(podudaranjeLozinki);
        $("#lozinka2").keyup(podudaranjeLozinki);


        $("#ime").keyup(function () {
            if (!provjeraVelikoSlovo("#ime"))
            {
                $("#greska").html("Ime treba sadržavati veliko početno slovo");
            }
            else
            {
                $("#greska").html("");
            }
        });

        $("#prezime").keyup(function () {
            if (!provjeraVelikoSlovo("#prezime"))
            {
                $("#greska").html("Prezime treba sadržavati veliko početno slovo");
            }
            else
            {
                $("#greska").html("");
            }
        });

        $("#grad").keyup(function () {
            if (!provjeraVelikoSlovo("#grad"))
            {
                $("#greska").html("Grad treba sadržavati veliko početno slovo");
            }
            else
            {
                $("#greska").html("");
            }
        });

        $("#email").keyup(function () {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/provjeraZauzece.php",
                context: document.body,
                dataType: "json",
                type: "GET",
                data:
                        {
                            fieldName: "email",
                            fieldVal: $("#email").val()
                        },
                success: function (json)
                {
                    $.each(json, function (key, val)
                    {
                        if (val !== 0)
                        {
                            $("#email").removeClass("ispravanUnos");
                            $("#email").addClass("ui-state-error");
                            $("#greska").html("E-mail je zauzet!");
                        }
                        else
                        {
                            $("#email").removeClass("ui-state-error");
                            $("#email").addClass("ispravanUnos");
                            $("#greska").html("");
                        }
                    });
                },
                error: function () {
                }
            });
        });
        $("#email").blur(function () {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/provjeraZauzece.php",
                context: document.body,
                dataType: "json",
                type: "GET",
                data:
                        {
                            fieldName: "email",
                            fieldVal: $("#email").val()
                        },
                success: function (json)
                {
                    $.each(json, function (key, val)
                    {
                        if (val !== 0)
                        {
                            $("#email").focus();
                        }
                    });
                },
                error: function () {
                }
            });
        });

        $("form").submit(function (event)
        {
            var validate = true;
            var poruka = "Provjerite unesene podatke";
            if (!provjeraVelikoSlovo("#ime"))
            {
                validate = false;
            }
            if (!provjeraVelikoSlovo("#prezime"))
            {
                validate = false;
            }
            if (!provjeraVelikoSlovo("#grad"))
            {
                validate = false;
            }
            if (!provjeraPrazno("#email"))
            {
                validate = false;
            }
            if (!provjeraPrazno("#korime"))
            {
                validate = false;
            }
            if (!provjeraPrazno("#datrodj"))
            {
                validate = false;
            }
            if (!(provjeraLozinke() && podudaranjeLozinki()))
            {
                validate = false;
            }
            if (!($('#spol').is(':checked') || $('#spol2').is(':checked')))
            {
                validate = false;
                poruka += " (Spol je obavezan!)";
            }

            if (!validate)
            {
                $("#greska").html(poruka);
                event.preventDefault();
            }
        });
    });
}

function provjeraVelikoSlovo(fieldName)
{
    if ($(fieldName).val().slice(0, 1) === $(fieldName).val().slice(0, 1).toUpperCase() && $(fieldName).val() !== "")
    {
        $(fieldName).removeClass("ui-state-error");
        $(fieldName).addClass("ispravanUnos");
        return true;
    }
    else {
        $(fieldName).removeClass("ispravanUnos");
        $(fieldName).addClass("ui-state-error");
        return false;
    }
}

function provjeraPrazno(fieldName)
{
    if ($(fieldName).val() === "")
    {
        $(fieldName).removeClass("ispravanUnos");
        $(fieldName).addClass("ui-state-error");
        return false;
    }
    else
    {
        $(fieldName).removeClass("ui-state-error");
        $(fieldName).addClass("ispravanUnos");
        return true;
    }
}

function provjeraLozinke()
{
    var vrijednost = $("#lozinka").val();
    var ok = true;
    if (vrijednost === "")
    {
        ok = false;
    }
    var re = /[A-Za-z0-9]{6,}/;
    if (!re.test(vrijednost))
    {
        ok = false;
    }
    re = /[0-9]/;
    if (!re.test(vrijednost))
    {
        ok = false;
    }
    re = /[a-z]/;
    if (!re.test(vrijednost))
    {
        ok = false;
    }
    re = /[A-Z]/;
    if (!re.test(vrijednost))
    {
        ok = false;
    }
    if (!ok)
    {
        $("#lozinka").removeClass("ispravanUnos");
        $("#lozinka").addClass("ui-state-error");
    }
    else
    {
        $("#lozinka").removeClass("ui-state-error");
        $("#lozinka").addClass("ispravanUnos");
    }
    return ok;
}

function podudaranjeLozinki()
{
    if ($("#lozinka").val() !== $("#lozinka2").val() || $("#lozinka").val() === "")
    {
        $("#lozinka").removeClass("ispravanUnos");
        $("#lozinka").addClass("ui-state-error");
        $("#greska").html("Lozinke se ne podudaraju");
        return false;
    }
    else
    {
        $("#lozinka").removeClass("ui-state-error");
        $("#lozinka").addClass("ispravanUnos");
        $("#greska").html("");
        return true;
    }
}
