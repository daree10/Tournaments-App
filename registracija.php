<?php

include_once './baza.class.php';
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$baza = new Baza();
include_once 'api/genKod.php';


if (isset($_POST["registracija"])) {

    $korime = $_POST["korime"];
    $kor_lozinka = $_POST["lozinka"];
    $kor_lozinka2 = $_POST["lozinka2"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $kor_email = $_POST["email"];
    $dat_rodjenja = $_POST["datrodj"];
    $zup = $_POST["zupanija"];
    $grad = $_POST["grad"];
    $spol_chkbox = $_POST["spol"];
    $captcha = $_POST['g-recaptcha-response'];

    $greska = "";

    if (!filter_var($kor_email, FILTER_VALIDATE_EMAIL)) {
        $greska .= "Netočno formatirana email adresa!<br>";
    }

    $r1 = '/[A-Z]/';
    $r2 = '/[a-z]/';
    $r3 = '/[0-9]/';
    if (!(preg_match($r1, $kor_lozinka) && preg_match($r2, $kor_lozinka) && preg_match($r3, $kor_lozinka))) {
        //. "(?=.[a-z])(?=.[0-9]).*$#", $kor_lozinka)) { 
        $greska .= "Krivo strukturirana lozinka!<br>";
    }
    if (!($kor_lozinka === $kor_lozinka2)) {
        $greska .= "Lozinke se ne podudaraju!<br>";
    }

    if (!ctype_upper(substr($ime, 0, 1))) {
        $greska .= "Ime ne pocinje velikim pocetnim slovom!<br>";
    } else {
        $smarty->assign('ime_ponovo', $ime);
    }

    if (!ctype_upper(substr($prezime, 0, 1))) {
        $greska .= "Prezime ne pocinje velikim pocetnim slovom!<br>";
    } else {
        $smarty->assign('prezime_ponovo', $prezime);
    }

    if (!ctype_upper(substr($grad, 0, 1))) {
        $greska .= "Grad ne pocinje velikim pocetnim slovom!<br>";
    } else {
        $smarty->assign('grad_ponovo', $grad);
    }

    if ($dat_rodjenja == "") {
        $greska .= "Datum nije postavljen!<br>";
    } else {
        $smarty->assign('datum_ponovo', $dat_rodjenja);
    }

    if (!($spol_chkbox == "mus" || $spol_chkbox == "zen")) {
        $greska .= "Spol nije odabran!<br>";
    } else {
        $smarty->assign('spol_ponovo', $spol_chkbox);
    }

    if (!$captcha) {
        $greska .= "Provjerite captchu!<br>";
    }

    $target_file = "img/no_pic.jpg";
    if (!empty($_FILES["slika"]["name"])) {
        include_once 'uploadSlike.class.php';

        $uploadSlike = new UploadSlike($korime, 'img/', $_FILES["slika"]["name"], $_FILES["slika"]["size"], $_FILES["slika"]["tmp_name"]);
        if($uploadSlike->uploadImg() == 0)
        {
            $greska .= $uploadSlike->getErrorMessage();
        }
        else
        {
            $target_file = $uploadSlike->getPath();
        }
    }
    
    if (empty($greska)) {
        $upit = "SELECT * FROM korisnik WHERE email = '" . $kor_email . "'";
        $rezultat = $baza->selectDB($upit);
        $upit = "SELECT * FROM korisnik WHERE korime = '" . $korime . "'";
        $rezultat2 = $baza->selectDB($upit);
        if ($rezultat->num_rows != 0 || $rezultat2->num_rows != 0) {

            if ($rezultat->num_rows != 0) {
                $greska .= "Zauzeta email adresa!<br>";
            }
            if ($rezultat2->num_rows != 0) {
                $greska .= "Zauzeto korisničko ime!<br>";
            }
        } else {

            do {
                $akt_kod = generiranjeAktivacijskogKoda(35);
                $upit = "SELECT * FROM korisnik WHERE aktivacijski_kod = '" . $akt_kod . "'";
                $rezultat = $baza->selectDB($upit);
            } while ($rezultat->num_rows != 0);
            include_once 'api/vrijeme.php';
            $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
            $upit = "INSERT INTO korisnik(datum_registracije,ime,prezime,email,url_slika,korime,lozinka,grad,zupanija,datum_rodjenja,spol,aktivacijski_kod,tip_korisnika_id,status_korisnika_id) VALUES ("
                    . "'" . $vrijeme . "',"
                    . "'" . $ime . "',"
                    . "'" . $prezime . "',"
                    . "'" . $kor_email . "',"
                    . "'" . $target_file . "',"
                    . "'" . $korime . "',"
                    . "'" . $kor_lozinka . "',"
                    . "'" . $grad . "',"
                    . "'" . $zup . "',"
                    . "'" . $dat_rodjenja . "',"
                    . "'" . substr($spol_chkbox, 0, 1) . "',"
                    . "'" . $akt_kod . "',"
                    . "1,3)";

            
            
            if ($baza->updateDB($upit)) {
                
                include_once 'api/vrijeme.php';
                $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
                $sqlLog = "INSERT INTO zapisnik(vrijeme,korisnik_id,tip_zahtjeva_id) VALUES('$vrijeme',(SELECT id FROM korisnik WHERE korime = '$korime'),5);";
                $baza->updateDB($sqlLog);
                
                $primatelj = $kor_email;
                $naslov = "WebDip 2015 aktivacija";
                $poruka = "Poštovani, "
                        . "aktivirajte svoj račun klikom na poveznicu "
                        . "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/aktivacija.php?kljuc=$akt_kod";
                mail($primatelj, $naslov, $poruka);
                header("Location: prijava.php");
            }
        }
    }
}
if (!empty($greska)) {
    $smarty->assign('errMessage', $greska);
}
$smarty->assign('title', "Registracija");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/registracija.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?> 