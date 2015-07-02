<?php
include_once 'vrijeme.php';
function LogNeuspjesnaPrijava($korime) {
    $baza = new Baza();
    $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
    $upitInsert = "INSERT INTO zapisnik (vrijeme, korisnik_id, tip_zahtjeva_id) VALUES("
            . "'$vrijeme',"
            . "(SELECT id FROM korisnik WHERE korime = '$korime'),"
            . "(SELECT id FROM tip_zahtjeva WHERE naziv = 'prijava' AND opis = 'neuspjesna')"
            . ");";
    $baza->updateDB($upitInsert);
    if (!provjeriBlokiran($korime)) {
        $upitUpdate = "UPDATE korisnik SET status_korisnika_id = (SELECT id FROM status_korisnika WHERE naziv = 'blokiran') WHERE korime = '$korime';";
        $baza->updateDB($upitUpdate);
        return false;
    }
    return true;
}

function provjeriBlokiran($korime) {
    $baza = new Baza();
    $upitAdmin = "SELECT tip_korisnika_id FROM korisnik WHERE korime = '$korime';";
    if($baza->selectDB($upitAdmin)->fetch_object()->tip_korisnika_id == "3")
    {
        return true;
    }
    $upitSelect = "SELECT tip_zahtjeva_id FROM zapisnik WHERE "
            . "korisnik_id = (SELECT id FROM korisnik WHERE korime = '$korime') "
            . "AND "
            . "(tip_zahtjeva_id = (SELECT id FROM tip_zahtjeva WHERE naziv = 'prijava' AND opis = 'neuspjesna')"
            . " OR "
            . "tip_zahtjeva_id = (SELECT id FROM tip_zahtjeva WHERE naziv = 'prijava' AND opis = 'uspjesna')"
            . ") ORDER BY vrijeme DESC;";
    $rezultat = $baza->selectDB($upitSelect);
    if ($rezultat->num_rows >= 3) {
        for ($i = 0; $i < 3; $i++) {
            $redak = $rezultat->fetch_row();
            if ($redak[0] == 1) {
                return true;
            }
        }
        return false;
    }
    return true;
}

function LogUspjesnaPrijava($korime) {
    $baza = new Baza();
    $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
    $upitInsert = "INSERT INTO zapisnik (vrijeme, korisnik_id, tip_zahtjeva_id) VALUES("
            . "'$vrijeme',"
            . "(SELECT id FROM korisnik WHERE korime = '$korime'),"
            . "(SELECT id FROM tip_zahtjeva WHERE naziv = 'prijava' AND opis = 'uspjesna')"
            . ");";
    $baza->updateDB($upitInsert);
}

function korisnikBlokiran($korime) {
    $baza = new Baza();
    $upit = "SELECT status_korisnika_id,tip_korisnika_id FROM korisnik WHERE korime = '$korime'";
    $rezultat = $baza->selectDB($upit);
    $red = $rezultat->fetch_row();
    $red[0] == 2 || $red[0] == 3 ? $returnVal = true : $returnVal = false;
    return $returnVal;
}
?>