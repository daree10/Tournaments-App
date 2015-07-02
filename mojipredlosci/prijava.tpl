        <section id="sadrzaj">
            {if isset($errMessage)}
                <section id="greska">
                    {$errMessage}
                </section>
            {/if}
            
            <article>
                <h1>Prijava</h1>
                <form method="POST" action="prijava.php">
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" placeholder="Korisnicko ime" 
                        {if isset($smarty.cookies.korime)}
                                value = {$smarty.cookies.korime}
                        {/if} 
                    autofocus="autofocus"/>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka"/>
                    <br>
                    <label for="zapamti">Zapamti me</label>
                    <input type="checkbox" name="zapamti" id="zapamti"/>
                    <input type="submit" name="prijava" value="Prijavi se" class="gumb"/>
                </form>
            </article>
            <article>
                Registriraj se <a href="registracija.php">ovdje</a>
            </article>
            <article>
                Zaboravio si lozinku? <a href="zaboravljena_lozinka.php">Klikni ovdje</a>
            </article>
        </section>