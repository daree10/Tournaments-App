    <script src ='js/turniriAJAX.js'></script>
    <script>
        getKategorijaByMod({$smarty.get.kor},'');
        $.ajax({
            url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/usersAPI.php",
            context: document.body,
            dataType: "json",
            type: "POST",
            data:
                    {
                        fieldName: "id",
                        fieldVal: {$smarty.get.kor}
                    },
            success: function (json)
            {
                $.each(json, function (key, val)
                {
                $(document).prop('title', val.korime);
                $("#headerZaglavlje").val("Detalji korisnika "+val.korime);
                $("#profilePic").attr("src",val.url_slika);
                
                $("#korime").val(val.korime);
                $("#lozinka").val(val.lozinka);
                $("#email").val(val.email);
                $("#ime").val(val.ime);
                $("#prezime").val(val.prezime);
                $("#datrodj").val(val.datum_rodjenja);
                $("#grad").val(val.grad);
                
                $("#zupanija").val(val.zupanija);
                $("#spol").val(val.spol);
                
                alert(val.status_korisnika_id);
                switch(val.status_korisnika_id){
                    case "2":
                    case "3":
                        $("#aktdeakt").val("Aktiviraj korisnika");
                        break;
                    default:
                        $("#aktdeakt").val("Deaktiviraj korisnika");
                }
            });
            },
            error: function () {
            }
        });
    </script>
        <section id="sadrzaj">
            {if isset($poruka)}
                <section id="successMessage">{$poruka}</section> 
            {/if}
            <article>
                <h1>Detalji</h1>
                <img id = "profilePic" src="" alt="slika korisnika" style="height: 300px;width:200px"/>
                <form action="detalji_korisnika.php?kor={$smarty.get.kor}" method="post" enctype="multipart/form-data">
                    <label for="slika">Promjeni sliku profila</label>
                    <input type="file" name="slika" id="slika"><br>
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" value="" size="20" maxlength="50"><br>
                    <label for="lozinka">Lozinka</label>
                    <input type="text" name="lozinka" id="lozinka" value="" size="20" maxlength="50"><br>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="" size="20" maxlength="50"><br>
                    <label for="ime">Ime</label>
                    <input type="text" name="ime" id="ime" value="" size="20" maxlength="50"><br>
                    <label for="prezime">Prezime</label>
                    <input type="text" name="prezime" id="prezime" value="" size="20" maxlength="50"><br>
                    <label for="datrodj">Datum rođenja</label>
                    <input type="date" name="datum_rodjenja" id ="datrodj" value="" id="datrodj"><br>   
                    <label for="grad">Grad</label>
                    <input type="text" name="grad" id="grad" value="" size="20" maxlength="50"><br>
                    <label for="zupanija">Županija</label>
                        <select name="zupanija" id="zupanija">
                            <option value="Vukovarsko-srijemska">Vukovarsko-srijemska</option>
                            <option value="Brodsko-posavska">Brodsko-posavska</option>
                            <option value="Osječko baranjska">Osječko baranjska</option>
                            <option value="Požeško-slavonska">Požeško-slavonska</option>
                            <option value="Virovitičko-podravska">Virovitičko-podravska</option>
                            <option value="Bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                            <option value="Sisačko-moslavačka">Sisačko-moslavačka</option>
                            <option value="Zagrebačka">Zagrebačka</option>
                            <option value="Grad Zagreb">Grad Zagreb</option>
                            <option value="Koprivničko-križevačka">Koprivničko-križevačka</option>
                            <option value="Međimurska">Međimurska</option>
                            <option value="Varaždinska">Varaždinska</option>
                            <option value="Krapinsko-zagorska">Krapinsko-zagorska</option>
                            <option value="Karlovačka">Karlovačka</option>
                            <option value="Primorsko-goranska">Primorsko-goranska</option>
                            <option value="Istarska">Istarska</option>
                            <option value="Ličko-senjska">Ličko-senjska</option>
                            <option value="Zadarska">Zadarska</option>
                            <option value="Šibensko-kninska">Šibensko-kninska</option>
                            <option value="Splitsko-dalmatinska">Splitsko-dalmatinska</option>
                            <option value="Dubrovačko-neretvanska">Dubrovačko-neretvanska</option>
                        </select>
                    <label for="spol">Spol</label>
                    <select name="spol" id="spol">
                        <option value="m">Muški</option>
                        <option value="z">Ženski</option>
                    </select>
                    <input type="submit" name="izmijeni" value="Izmijeni podatke o korisniku" class="gumb"/>
                    {if $smarty.session.tip_korisnika eq 3}
                        <input type='submit' name='aktdeakt' class='gumb' id="aktdeakt" value=""/>
                        <select name="modKat" id="modKat">
                            
                        </select>
                        <input type="submit" name="modKategorija" value="Učini moderatorom za kategoriju"/>
                    {/if}
                </form>
            </article>
        </section>