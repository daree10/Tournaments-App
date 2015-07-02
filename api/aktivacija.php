<?php
include_once '../baza.class.php';

if (isset($_GET["kljuc"])) {
    
    $baza = new Baza();
    $akt_kod = $_GET["kljuc"];
    
    $upitEliminacijski = "SELECT * FROM korisnik WHERE aktivacijski_kod = '$akt_kod' AND status_korisnika_id = (SELECT id FROM status_korisnika WHERE naziv = 'neaktiviran');";
    $rezultatEliminacijski = $baza->selectDB($upitEliminacijski);
    if($rezultatEliminacijski->num_rows == 0)
    {
        header("Location: ../prijava.php");
    }
    
    $upit = "SELECT id,datum_registracije FROM korisnik WHERE aktivacijski_kod = '" . $akt_kod . "';";
    $rezultat = $baza->selectDB($upit);
    
    $red = mysqli_fetch_row($rezultat);

    $datum_registracije = new DateTime($red[1]);
    ob_start();
    include_once 'vrijeme.php';
    $danas = getVrijeme();

    $razlika = $danas->diff($datum_registracije);

    $godina_proslo = intval($razlika->format("%Y")) * 8765;
    $mjeseci_proslo = intval($razlika->format("%m")) * 730;
    $dana_proslo = intval($razlika->format("%d")) * 24;
    $sati_proslo = intval($razlika->format("%H"));

    $proslo_vremena = $godina_proslo + $mjeseci_proslo + $dana_proslo + $sati_proslo;
    
    $poruka = "";

    if ($proslo_vremena < 24) {
        $poruka = "Korisnik aktiviran!";
        
        $sql = "UPDATE korisnik SET status_korisnika_id = (SELECT id FROM status_korisnika WHERE naziv = 'aktiviran') WHERE id = " . $red[0] . ";";
        $baza->updateDB($sql);
        ob_end_clean();
        header("Location: ../prijava.php");        
    } else {
        ob_end_clean();
        $poruka = "Aktivacijski kod istekao! Registrirali ste se prije " . $proslo_vremena . " h";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>O autoru</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/dvertovs.css"/>
    </head>
    <body>
        <nav id="izbornik"> 
            <ul>
                <li><a href="../prijava.php">Prijava</a></li>
                <li><a href="../registracija.php">Registracija</a></li>
            </ul>
        </nav>
        <section id="sadrzaj">
            <?php echo $poruka; ?>
            </section>
       

    </body>
</html>

        

        