<?php
session_start();
if (!isset($_SESSION["id_kor"])) {
    header("Location: prijava.php");
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->assign('title', "Početna stranica");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/index.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>