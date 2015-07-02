<?php

session_start();

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->assign('title', "Turniri");
$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/turniri_reg.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>

