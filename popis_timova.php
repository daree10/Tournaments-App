<?php

session_start();
include_once 'limit_access.php';
login_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('title', "Popis timova");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/popis_timova.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>