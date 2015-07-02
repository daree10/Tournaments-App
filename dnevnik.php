<?php

session_start();
include_once 'limit_access.php';
login_only();
admin_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->assign('title', "Dnevnik");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/dnevnik.tpl');
$smarty->display('mojipredlosci/_footer.tpl');

?>

