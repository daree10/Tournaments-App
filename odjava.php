<?php

session_start();
if (isset($_SESSION["id_kor"])) {
    include_once 'baza.class.php';
    $baza = new Baza();
    $baza->updateDB("UPDATE korisnik SET datum_zadnjeg_pristupa = '" . $_SESSION["vrijeme_prijave_sad"] . "' WHERE id=" . $_SESSION["id_kor"] . ";");
    include_once 'api/vrijeme.php';
    $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
    $baza->updateDB("INSERT INTO zapisnik(vrijeme,korisnik_id,tip_zahtjeva_id) VALUES('$vrijeme', ".$_SESSION["id_kor"].",4)");
    session_destroy();
}
header("Location: prijava.php");
?>

