<?php
session_start();
require 'limit_access.php';
login_only();
mod_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
include_once 'baza.class.php';
if(isset($_POST["zahtjevsend"]))
{
    $idTim = $_POST["idtim"];
    $baza = new Baza();
    if($_POST["zahtjevsend"] == "Prihvati")
    {
        include_once 'api/vrijeme.php';
        $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
        $sql = "UPDATE tim SET vrijeme_pristupa_turniru = '$vrijeme',razlog_odbacivanja = null WHERE id = $idTim;";
        $baza->updateDB($sql);
    }
    else
    {
        $razlog = $_POST["razlog$idTim"];
        $sql2 = "UPDATE tim SET razlog_odbacivanja = '$razlog',vrijeme_pristupa_turniru = null WHERE id = $idTim;";
        $baza->updateDB($sql2);
    }
}

$smarty->assign('title', "Zahtjevi");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/zahtjevi.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>

