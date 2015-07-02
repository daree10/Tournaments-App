<?php /* Smarty version Smarty-3.1.18, created on 2015-05-15 17:02:04
         compiled from "header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214346825255560a6cd6c939-98324005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdc07859828693f2c6b3da2fc9183fc36cce2159' => 
    array (
      0 => 'header.tpl',
      1 => 1431702116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214346825255560a6cd6c939-98324005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'zaglavlje' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55560a6ce4a7e9_14883576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55560a6ce4a7e9_14883576')) {function content_55560a6ce4a7e9_14883576($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Darijan Vertovšek"/>
        <meta name="dcterms.created" content = "2015-03-11"/> 
        <link rel="stylesheet" type="text/css" href="css/dvertovs.css"/>
    </head>

    <body>
        <header id="zaglavlje">
            <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1> 
            <div style="text-align: center;">
                <?php echo $_smarty_tpl->tpl_vars['zaglavlje']->value;?>

                <a style="margin-left: 20%" href="odjava.php">Odjava</a>
            </div>
        </header><?php }} ?>
