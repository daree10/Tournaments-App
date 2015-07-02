        <section id="sadrzaj">
            {if isset($msg)}
                <section id="greska">
                    {$msg}
                </section>
            {/if}
            
            <article>
                <h1>Unesite vaše korisničko ime</h1>
                <form method="POST" action="zaboravljena_lozinka.php">
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" placeholder="Korisnicko ime" autofocus="autofocus"/>
                    <br>
                    <input type="submit" name="prijava" value="Pošaljite mi lozinku" class="gumb"/>
                </form>
            </article>
        </section>