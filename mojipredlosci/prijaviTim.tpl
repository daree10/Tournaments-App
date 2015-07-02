{literal}
    <script src ='js/validacijav2.js'></script>
{/literal}
<section id="sadrzaj">
            
                <section id="greska">

                    {$errMessage}
                    
                </section>
           
            <section id="successMessage">

                    {$sMessage}
                    
                </section>
            <article>
                <h1>Prijava timova</h1>
                <form method="POST" action="prijaviTim.php?idTurnir={$smarty.get.idTurnir}">
                    <label for="nazivtima">Naziv tima</label>
                    <input type="text" name="nazivtima" id="nazivtima" placeholder="Naziv tima" autofocus="autofocus"/><br>
                    <label for="opistima">Opis tima</label>
                    <textarea rows="10" cols="45" name="opistima" id="opistima"></textarea><br>
                    <input type="submit" name="prijava" value="Prijavi tim"/>
                </form>
            </article>
            <article>
                Pogledaj dostupne turnire <a href="turniri_reg.php">ovdje</a>
            </article>
        </section>