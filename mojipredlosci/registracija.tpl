        <section id="sadrzaj"> 
                <div id="greska">
                    {$errMessage}
                </div>
            <article>
                <h1>Registriraj se</h1>
                <form id="registracija" action="registracija.php" method="POST" enctype="multipart/form-data">
                    <div id="korime_zauzeto">
                        
                    </div>
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" size="20" maxlength="50" 
                        {if isset($korime_ponovo)}
                            value="{$korime_ponovo}"
                        {/if}
                    ><br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" id="lozinka" size="20"><br>
                    <label for="lozinka2">Ponovite lozinku</label>
                    <input type="password" name="lozinka2" id="lozinka2" size="20"><br>
                    <label for="ime">Ime</label>
                    <input type="text" name="ime" id="ime" size="20" maxlength="30"
                        {if isset($ime_ponovo)}
                            value="{$ime_ponovo}"
                        {/if}
                    ><br>
                    <label for="prezime">Prezime</label>
                    <input type="text" name="prezime" id="prezime" size="20" maxlength="50"             
                    {if isset($prezime_ponovo)}
                            value="{$prezime_ponovo}"
                        {/if}
                    ><br>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" size="20" maxlength="50" 
                        {if isset($email_ponovo)}
                            value="{$email_ponovo}"
                        {/if}
                    ><br>
                    <label for="datrodj">Datum rođenja</label>
                    <input type="date" name="datrodj" id="datrodj"
                    {if isset($datum_ponovo)}
                            value="{$datum_ponovo}"
                        {/if}
                    ><br>
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
                            <option value="Varaždinska" selected>Varaždinska</option>
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
                    <label for="grad">Grad</label>
                    <input type="text" name="grad" id="grad" size="20" maxlength="50"
                    {if isset($grad_ponovo)}
                            value="{$grad_ponovo}"
                        {/if}
                    ><br>
                    <label for="slika">Slika</label>
                    <input type="file" name="slika" id="slika"><br>
                    <label for="spol">Muski</label>
                    <input type="radio" name="spol" id="spol" value="mus"
                    {if isset($spol_ponovo)}
                        {if $spol_ponovo eq "mus"}
                            checked
                        {/if}
                    {/if}       
                    >
                    <label for="spol2">Zenski</label>
                    <input type="radio" name="spol" id="spol2" value="zen"
                    {if isset($spol_ponovo)}
                        {if $spol_ponovo eq "zen"}
                            checked
                        {/if}
                    {/if}              
                    >
                    <div class="g-recaptcha" data-sitekey="6Lc3OgYTAAAAADMWBFt_DRo92k_pQVIWTuYBbbdN"></div>
                    <input type="submit" name="registracija" value="Registracija" class="gumb">
                    <input type="reset" value="Brisanje formulara" class="gumb">
                </form>
            </article>
        </section>