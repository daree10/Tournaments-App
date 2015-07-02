<?php

session_start();
include_once 'limit_access.php';
login_only();
admin_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

if(isset($_POST["preuzmi"]))
{
    include_once 'baza.class.php';
    $baza = new Baza();
    $pomak = $_POST["pomak"];
    $baza->updateDB("UPDATE virtual_time SET time_offset = $pomak;");
}

$smarty = new Smarty();
$smarty->assign('title', "Pomak vremena");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/pomak_vremena.tpl');
$smarty->display('mojipredlosci/_footer.tpl');

?>

