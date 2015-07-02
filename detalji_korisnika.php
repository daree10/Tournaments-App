<?php

session_start();
include_once 'limit_access.php';
login_only();
if ($_SESSION["id_kor"] != $_GET["kor"] && $_SESSION["tip_korisnika"] != 3) {
    header("Location: detalji_korisnika.php?kor=" . $_SESSION["id_kor"]);
}
include_once './baza.class.php';
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$baza = new Baza();
if (isset($_GET["kor"])) {
    $id_kor = $_GET["kor"];
    if (isset($_POST["izmijeni"])) {
        $novi_email = $_POST["email"];
        $novi_lozinka = $_POST["lozinka"];
        $novi_ime = $_POST["ime"];
        $novi_prezime = $_POST["prezime"];
        $novi_datum_rodjenja = $_POST["datum_rodjenja"];
        $novi_grad = $_POST["grad"];
        $novi_spol = $_POST["spol"];
        $novo_korime = $_POST["korime"];
        $novo_zupanija = $_POST["zupanija"];


        $upit = "SELECT email,lozinka,ime,prezime,datum_rodjenja,spol,grad,korime,zupanija FROM korisnik WHERE id = " . $id_kor . ";";
        $rezultat = $baza->selectDB($upit);
        $red = mysqli_fetch_row($rezultat);

        $smarty->assign('korime', $red[7]);

        $poruka = "";
        if ($red[0] != $novi_email) {
            $poruka .= "E-mail izmijenjen!<br>";
            $sqlUpdate = "UPDATE korisnik SET email = '" . $novi_email . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[1] != $novi_lozinka) {
            $poruka .= "Lozinka izmijenjena!<br>";
            $sqlUpdate = "UPDATE korisnik SET lozinka = '" . $novi_lozinka . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[2] != $novi_ime) {
            $poruka .= "Ime izmijenjeno!<br>";
            $sqlUpdate = "UPDATE korisnik SET ime = '" . $novi_ime . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[3] != $novi_prezime) {
            $poruka .= "Prezime izmijenjeno!<br>";
            $sqlUpdate = "UPDATE korisnik SET prezime = '" . $novi_prezime . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[4] != $novi_datum_rodjenja) {
            $poruka .= "Datum rođenja izmijenjen!<br>";
            $sqlUpdate = "UPDATE korisnik SET datum_rodjenja = '" . $novi_datum_rodjenja . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[5] != $novi_spol) {
            $poruka .= "Spol izmijenjen!<br>";
            $sqlUpdate = "UPDATE korisnik SET spol = '" . $novi_spol . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[6] != $novi_grad) {
            $poruka .= "Grad izmijenjen!<br>";
            $sqlUpdate = "UPDATE korisnik SET grad = '" . $novi_grad . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[7] != $novo_korime) {
            $poruka .= "Korisničko ime izmijenjeno!<br>";
            $sqlUpdate = "UPDATE korisnik SET korime = '" . $novo_korime . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if ($red[8] != $novo_zupanija) {
            $poruka .= "Županija izmijenjena!<br>";
            $sqlUpdate = "UPDATE korisnik SET zupanija = '" . $novo_zupanija . "' WHERE id = " . $id_kor . ";";
            $baza->updateDB($sqlUpdate);
        }
        if (!empty($_FILES["slika"]["name"])) {
            include_once 'uploadSlike.class.php';

            $uploadSlike = new UploadSlike($novo_korime, 'img/', $_FILES["slika"]["name"], $_FILES["slika"]["size"], $_FILES["slika"]["tmp_name"]);
            if ($uploadSlike->uploadImg() != 0) {
                $target_file = $uploadSlike->getPath();
                $sqlUpdate = "UPDATE korisnik SET url_slika = '" . $target_file . "' WHERE id = " . $id_kor . ";";
                $baza->updateDB($sqlUpdate);
                $poruka .= "Slika profila izmijenjena!<br>";
            }
        }

        include_once 'api/vrijeme.php';
        $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
        $sqlLog = "INSERT INTO zapisnik(vrijeme,korisnik_id,tip_zahtjeva_id) VALUES('$vrijeme'," . $_SESSION["id_kor"] . ",3);";
        $baza->updateDB($sqlLog);
    }

    if (isset($_POST["aktdeakt"])) {

        $status = substr($_POST["aktdeakt"], 0, 1);

        if ($status == "D") {
            $sql = "UPDATE korisnik SET status_korisnika_id = (SELECT id FROM status_korisnika WHERE naziv = 'blokiran') WHERE id =" . $id_kor . ";";
        } else {
            $sql = "UPDATE korisnik SET status_korisnika_id = (SELECT id FROM status_korisnika WHERE naziv = 'aktiviran') WHERE id =" . $id_kor . ";";
        }

        $baza->updateDB($sql);
    }

    if (isset($_POST["modKategorija"])) {

        $kategorija = $_POST["modKat"];

        $sql = "INSERT INTO mod_kategorija(korisnik_moderator_id,kategorija_id) VALUES ($id_kor,$kategorija);";
        $baza->updateDB($sql);
        $sql2 = "UPDATE korisnik SET tip_korisnika_id = (SELECT id FROM tip_korisnika WHERE naziv = 'moderator') WHERE id = $id_kor AND tip_korisnika_id = (SELECT id FROM tip_korisnika WHERE naziv = 'registrirani');";
        $baza->updateDB($sql2);

        $poruka .= "Moderatura dodijeljena!<br>";
    }

    if (!empty($poruka)) {
        $smarty->assign('poruka', $poruka);
    }

    $smarty->assign('title', 'Detalji korisnika');

    $smarty->display('mojipredlosci/_header.tpl');
    $smarty->display('mojipredlosci/_navig.tpl');
    $smarty->display('mojipredlosci/detalji_korisnika.tpl');
    $smarty->display('mojipredlosci/_footer.tpl');
}
?>