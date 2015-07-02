<?php

session_start();
include_once 'limit_access.php';
login_only();

include_once 'baza.class.php';

if (isset($_GET["idTurnir"])) {
    $idTurnir = $_GET["idTurnir"];
    require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
    $smarty = new Smarty();

    $greska = "";
    $success = "";
    if (isset($_POST["prijava"])) {
        $nazivtima = $_POST["nazivtima"];
        $opistima = $_POST["opistima"];

        $baza = new Baza();

        $sql = "SELECT nazivtima FROM tim WHERE nazivtima = '$nazivtima' AND turnir_id = $idTurnir;";

        if ($baza->selectDB($sql)->num_rows != 0) {
            $greska .= "Naziv tima je zauzet. <br>";
        }

        $sql2 = "SELECT * FROM turnir WHERE (SELECT maxnatjecatelja FROM turnir WHERE id = $idTurnir) < (SELECT COUNT(*) FROM tim WHERE turnir_id = $idTurnir AND razlog_odbacivanja IS NOT NULL);";

        if ($baza->selectDB($sql2)->num_rows != 0) {
            $greska .= "Turnir nema više slobodnih mjesta. <br>";
        }
        include_once 'api/vrijeme.php';
        $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
        $sql3 = "SELECT * FROM korisnik WHERE (SELECT TIMESTAMPDIFF(DAY,datum_pocetka,'$vrijeme') FROM turnir WHERE id = $idTurnir) <= -1;";
        
        if ($baza->selectDB($sql3)->num_rows == 0) {
            $greska .= "Zakasnili ste sa prijavom. <br>";
        }
        
        if (empty($greska)) {
            $updateSQL = "INSERT INTO tim(nazivtima,opistima,korisnik_predstavnik_id,turnir_id) VALUES("
                    . "'$nazivtima',"
                    . "'$opistima',"
                    .   $_SESSION["id_kor"].","
                    . "$idTurnir);";
            $baza->updateDB($updateSQL);
            $success = "Zahtjev poslan!";
        }
    }
    if(!empty($greska))
    {
        $smarty->assign('errMessage', $greska);
    }
    else
    {
        $smarty->assign('sMessage', $success);
    }
    $smarty->assign('title', "Prijava tima");

    $smarty->display('mojipredlosci/_header.tpl');
    $smarty->display('mojipredlosci/_navig.tpl');
    $smarty->display('mojipredlosci/prijaviTim.tpl');
    $smarty->display('mojipredlosci/_footer.tpl');
}
?>

