<?php

include_once './baza.class.php';
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

if (isset($_POST["korime"])) {
    $korime = $_POST["korime"];

    $baza = new Baza();
    $upit = "SELECT email,ime,prezime,lozinka,id FROM korisnik WHERE korime = '$korime';";

    $rezultat = $baza->selectDB($upit);

    $red = mysqli_fetch_row($rezultat);

    $primatelj = $red[0];
    $naslov = "Zaboravljena lozinka";
    $poruka = "Poštovani $red[1] $red[2], "
            . "vaša lozinka je $red[3] "
            . "Link na prijavu: http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/prijava.php";
    mail($primatelj, $naslov, $poruka);

    $smarty->assign('msg', "Lozinka je poslana na Vaš e-mail.");

    include_once 'api/vrijeme.php';
    $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
    $idKor = $red[4];
    $sqlLog = "INSERT INTO zapisnik(vrijeme,korisnik_id,tip_zahtjeva_id) VALUES('$vrijeme',$idKor,7);";
    $baza->updateDB($sqlLog);
}

$smarty->display("mojipredlosci/_header.tpl");
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display("mojipredlosci/zaboravljena_lozinka.tpl");
$smarty->display("mojipredlosci/_footer.tpl");
?>