<script>
    function getZahtjevi(zahtjevi, idKor)
    {
        console.log("1");
        $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/getZahtjeviAPI.php",
                context: document.body,
                dataType: "json",
                type: "POST",
                data:
                        {
                            requestType: zahtjevi,
                            userID:idKor
                        },
                success: function (json)
                {
                    var dodati = "";
                    $.each(json, function (key, val)
                        {
                            dodati += "<form action='zahtjevi.php' method='post' class = category>";
                            dodati += "<input style='display:none;' type='text' value='"+val.id+"' name='idtim' readonly><br>";
                            dodati += "<label for ='nazivtima'>Naziv tima</label>";
                            dodati += "<input type='text' value='"+val.nazivtima+"' id='nazivtima' readonly><br>";
                            dodati += "<label for ='opistima'>Opis tima</label>";
                            dodati += "<textarea rows='10' cols='45' id='opistima'>"+val.opistima+"</textarea><br>";
                            dodati += "<label for ='predstavnik'>Predstavnik</label>";
                            dodati += "<input type='text' value='"+val.predstavnik+"' id='predstavnik' readonly><br>";
                            dodati += "<label for ='turnirnaziv'>Turnir</label>";
                            dodati += "<input type='text' value='"+val.turnirnaziv+"' id='turnirnaziv' readonly><br>";
                            if(zahtjevi == "odbijeni")
                            {
                                dodati += "<label id='labelarazlog"+val.id+"' for ='razlog"+val.id+"'>Razlog</label>";
                                dodati += "<textarea rows='10' cols='45' id='razlog"+val.id+"' name='razlog"+val.id+"'>"+val.razlogodb+"</textarea><br>";
                            }
                            else
                            {
                                dodati += "<label id='labelarazlog"+val.id+"' class=skrivena for ='razlog"+val.id+"'>Razlog</label>";
                                dodati += "<textarea class=skrivena rows='10' cols='45' id='razlog"+val.id+"' placeholder='Molimo navedite razlog odbacivanja...' name='razlog"+val.id+"'></textarea><br>";
                            }
                            dodati += "<input type='submit' name='zahtjevsend' value = 'Prihvati' style='background-color:#3EC96A;font-weight:bold;'>";
                            dodati += "<input type='submit' onclick='validateRazlog("+val.id+");' name='zahtjevsend' value = 'Odbij' style='background-color:#D4355A;font-weight:bold;'>";
                            dodati += "</form>";
                        });
                        
                    $("#zahtjevi").html(dodati);
                },
                error: function () {
                }
            });
    }
    function validateRazlog(idTim)
    {
        $("#razlog"+idTim).removeClass("skrivena");
        $("#labelarazlog"+idTim).removeClass("skrivena");
        console.log(2);
        if($("#razlog"+idTim).val() == "")
        {
            event.preventDefault();
        }
    }
    getZahtjevi("novi",{$smarty.session.id_kor});
</script>

<section id="sadrzaj">
    <select onchange="getZahtjevi(this.options[this.selectedIndex].value,{$smarty.session.id_kor});">
        <option value='novi' selected>
            Novi zahtjevi
        </option>
        <option value='odbijeni'>
            Odbijeni
        </option>
        <option value='prihvaceni'>
            Prihvaćeni
        </option>
    </select>
    
    <section id="zahtjevi">

            </section> 
</section>