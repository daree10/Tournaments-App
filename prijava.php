<?php

session_start();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
include_once 'baza.class.php';
include_once 'api/funkcijePrijava.php';

$smarty = new Smarty();

$kolacic_ime = "korime";

if (isset($_POST["prijava"])) {
    $korime = $_POST["korime"];
    $kor_lozinka = $_POST["lozinka"];
    $kor_zapamti = $_POST["zapamti"];

    $baza = new Baza();
    $sqlUpit = "SELECT id,tip_korisnika_id,korime,lozinka,ime,prezime,datum_zadnjeg_pristupa FROM korisnik WHERE korime = '" . $korime . "';";
    $rezultat = $baza->selectDB($sqlUpit);
    $greska = "";
    if (mysqli_num_rows($rezultat) == 0) {
        $greska = "Provjerite korisničko ime";
    } else {
        $red = mysqli_fetch_row($rezultat);
        if ($red[3] == $kor_lozinka) {
            if (!korisnikBlokiran($korime)) {
                $_SESSION["id_kor"] = $red[0];
                $_SESSION["tip_korisnika"] = $red[1];
                $_SESSION["korime"] = $red[2];
                $_SESSION["ime"] = $red[4];
                $_SESSION["prezime"] = $red[5];

                include_once 'api/vrijeme.php';
                $_SESSION["vrijeme_prijave_zadnje"] = formatTime($red[6]);

                $vrijemePrijave = getVrijeme();
                $_SESSION["vrijeme_prijave_sad"] = $vrijemePrijave->format('Y-m-d H:i:s');
                if ($kor_zapamti) {
                    setcookie($kolacic_ime, $_SESSION["korime"], time() + 86400 * 30);
                } else {
                    setcookie($kolacic_ime, $_SESSION["korime"], time() - 86400 * 30);
                }
                LogUspjesnaPrijava($korime);
                header("Location: index.php");
            } else {
                $greska = "Vaš račun je blokiran ili nije email potvrđen...";
            }
        } else {

            if (!LogNeuspjesnaPrijava($korime)) {
                $greska = "Imate tri neuspješne prijave za redom - Račun blokiran!";
                include_once 'api/vrijeme.php';
                $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
                $sqlLog = "INSERT INTO zapisnik(vrijeme,korisnik_id,tip_zahtjeva_id) VALUES('$vrijeme',(SELECT id FROM korisnik WHERE korime = '$korime'),6);";
                $baza->updateDB($sqlLog);
            } else {
                $greska = "Provjerite lozinku";
            }
        }
    }
}
if (!empty($greska)) {
    $smarty->assign('errMessage', $greska);
}
$smarty->assign('title', "Prijava");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/prijava.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>