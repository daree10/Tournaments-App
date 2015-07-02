<?php /* Smarty version Smarty-3.1.18, created on 2015-05-15 17:59:01
         compiled from "_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188940874455560d08c15738-48433880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f13d6ff8b9f3c3068f990e6bd54b3508d3776c4' => 
    array (
      0 => '_header.tpl',
      1 => 1431705538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188940874455560d08c15738-48433880',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55560d08c8cc76_89317741',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55560d08c8cc76_89317741')) {function content_55560d08c8cc76_89317741($_smarty_tpl) {?><!DOCTYPE html>
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
            
        </header>
        <?php if (isset($_SESSION['id_kor'])) {?>
            <div style = "float:right">
                Zadnja uspješna prijava: <?php echo $_SESSION['vrijeme_prijave_zadnje'];?>
 | <?php echo $_SESSION['ime'];?>
 <?php echo $_SESSION['prezime'];?>

                <a href="odjava.php">Odjava</a>
            </div>
        <?php }?><?php }} ?>
