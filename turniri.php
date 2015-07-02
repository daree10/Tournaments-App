<?php

session_start();
include_once 'limit_access.php';
login_only();
mod_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

if (isset($_POST["addTurnir"])) {
    $greska = "";

    if (empty($_POST["naziv"])) {
        $greska .= "Polje naziv je obavezno!<br>";
    }

    if (empty($_POST["pravila"])) {
        $greska .= "Pravila su obavezna!<br>";
    }

    if (empty($_POST["br_sud"])) {
        $greska .= "Max broj sudionika je obavezan!<br>";
    } else {
        if ($_POST["br_sud"] <= 0) {
            $greska .= "Max broj sudionika nije dobro unesen!<br>";
        }
    }

    if (empty($_POST["datpoc"])) {
        $greska .= "Datum početka je obavezan!<br>";
    }

    if (empty($_POST["kategorija"])) {
        $greska .= "Kategorija nije odabrana!<br>";
    }

    if (empty($greska)) {
        include_once './baza.class.php';
        $baza = new Baza();
        $naziv = $_POST["naziv"];
        $sql = "SELECT * FROM turnir WHERE naziv = '$naziv';";
        $rezultat = $baza->selectDB($sql);
        if ($rezultat->num_rows == 0) {
            $pravila = $_POST["pravila"];
            $br_sud = $_POST["br_sud"];
            $datpoc = $_POST["datpoc"];
            $kategorija = $_POST["kategorija"];
            $idMod = $_SESSION["id_kor"];

            $sqlUpdate = "INSERT INTO turnir(naziv,pravila,maxnatjecatelja,kategorija_id,korisnik_moderator_id,tim_pobjednik_id,datum_pocetka) VALUES("
                    . "'$naziv',"
                    . "'$pravila',"
                    . "'$br_sud',"
                    . "$kategorija, $idMod, NULL, '$datpoc');";

            $baza->updateDB($sqlUpdate);
        } else {
            $greska .= "Turnir naziva $naziv već postoji!";
        }
    }

    if (!empty($greska)) {
        $smarty->assign('naziv_ponovo', $_POST["naziv"]);
        $smarty->assign('pravila_ponovo', $_POST["pravila"]);
        $smarty->assign('br_sud_ponovo', $_POST["br_sud"]);
        $smarty->assign('datpoc_ponovo', $_POST["datpoc"]);
        $smarty->assign('errMessage', $greska);
    }
}

$smarty->assign('title', "Dodavanje turnira");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/turniri.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>

