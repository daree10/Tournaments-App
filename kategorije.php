<?php
session_start();
include_once 'limit_access.php';
admin_only();
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();
$smarty->assign('title', "Kategorije turnira");

$smarty->display('mojipredlosci/_header.tpl');
$smarty->display('mojipredlosci/_navig.tpl');
$smarty->display('mojipredlosci/kategorije.tpl');
$smarty->display('mojipredlosci/_footer.tpl');
?>