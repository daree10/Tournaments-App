<nav id="izbornik"> 
            <ul>
                {if isset($smarty.session.id_kor)}
                    
                <li><a href="index.php">Početna</a></li>
                <li><a href="popis_timova.php">Popis timova</a></li>
                
                {if ($smarty.session.tip_korisnika == 3)}
                    <li><a href='popis_korisnika.php'>Popis korisnika</a></li>
                    <li><a href='kategorije.php'>Kategorije</a></li>
                    <li><a href='pomak_vremena.php'>Pomak vremena</a></li>
                    <li><a href='dnevnik.php'>Dnevnik</a></li>
                {/if}
                
                {if ($smarty.session.tip_korisnika == 3) or ($smarty.session.tip_korisnika == 2)}
                    <li><a href='turniri.php'>Dodavanje turnira</a></li>
                    <li><a href='zahtjevi.php'>Zahtjevi</a></li>
                {/if}
                
                {if ($smarty.session.tip_korisnika == 1) or ($smarty.session.tip_korisnika == 2)}
                    <li><a href='detalji_korisnika.php?kor={$smarty.session.id_kor}'>Detalji</a></li>
                {/if}
                
                {else}
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                {/if}
                <li><a href="turniri_reg.php">Turniri</a></li>
                <li><a href="o_autoru.html">O autoru</a></li>
                <li><a href="dokumentacija.html">Dokumentacija</a></li>
            </ul>
        </nav>