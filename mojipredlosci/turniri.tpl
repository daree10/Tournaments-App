{literal}
    <script src ='js/turniriAJAX.js'></script>
    <script src ='js/validacijav2.js'></script>
    <script>
        function showTeams(idTurnir)
        {
            $( "#dialog"+idTurnir ).dialog({
                //height: 50,
                //width: 350,
                modal: true,
                resizable: true,
                dialogClass: 'no-close moderator-dialog'
            });
        }
        function turniriCRUDAjax(fieldNo, fieldVal, idTurnir)
        {
            var fieldName = "";
            switch(fieldNo)
            {
                case 1: fieldName = "naziv";
                    break;
                case 2: fieldName = "pravila";
                    break;
                case 3: fieldName = "maxnatjecatelja";
                    break;
                case 4: fieldName = "datum_pocetka";
                    break;
            }
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriCRUDAPI.php",
                context: document.body,
                dataType: "json",
                type: "POST",
                data:
                        {
                            fieldName: fieldName,
                            fieldVal: fieldVal,
                            idTurnir: idTurnir
                        },
                success: function (json)
                {
                    if(json.uspjeh != "true")
                    {
                        alert(json.uspjeh);
                    }
                    if(json.naziv != "")
                    {
                        $("#naziv"+idTurnir).val(json.naziv);
                    }
                },
                error: function () {
                }
            });
        }
        function winTournament(idTurnir, idTim)
        {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/winAPI.php",
                context: document.body,
                dataType: "json",
                type: "POST",
                data:
                        {
                            idTeam: idTim,
                            idTournament: idTurnir
                        },
                success: function (json)
                {
                    location.reload();
                },
                error: function () {
                }
            });
        }
    </script>
{/literal}
<iframe onload="getKategorijaByMod({$smarty.session.id_kor},'true');" style = "display:none;" src="#"></iframe>

<section id="sadrzaj">
    <div id="greska">
                    {$errMessage}
                </div>
    <form class = tournament action="turniri.php" method="POST">
            <section>
                <label for="kategorija">Kategorija: </label>
                <select onchange = "getTurniriAJAX(this.options[this.selectedIndex].value,{$smarty.session.id_kor});" name="kategorija" id="kategorija">

                </select>  
            </section> 
            <h1>Novi turnir</h1>
                 <label for="naziv">Naziv turnira</label>
                 <input type="text" name="naziv" id="naziv" size="20" maxlength="50"
                     {if isset($naziv_ponovo)}
                        value="{$naziv_ponovo}"
                     {/if}
                 ><br>
                 <label for="pravila">Pravila</label>
                 <textarea rows="10" cols="45" name="pravila" id="pravila">{if isset($pravila_ponovo)}{$pravila_ponovo}{/if}</textarea><br>
                 <label for="br_sud">Max broj sudionika</label>
                 <input type="number" name="br_sud" id="br_sud" size="20" maxlength="50"
                 {if isset($br_sud_ponovo)}
                        value="{$br_sud_ponovo}"
                 {/if}
                 ><br>
                 <label for="datpoc">Datum početka</label>
                 <input type="date" name="datpoc" id="datpoc"
                 {if isset($datpoc_ponovo)}
                        value="{$datpoc_ponovo}"
                 {/if}
                 ><br>
                 <input style="width:89%;" type="submit" name="addTurnir" value="Dodaj turnir">
        </form>
                 <h1>Turniri odabrane kategorije</h1>
                 <section id="turniri">

            </section> 
            
            <section id ="dialogSpace" style="display:none;">
                     
                 </section>
        </section>
                 
                 