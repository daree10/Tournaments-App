<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 03:48:52
         compiled from "mojipredlosci/_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695025006555619a448ec99-40156443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '376ae090150a3a22c1152272274f70638d85e371' => 
    array (
      0 => 'mojipredlosci/_header.tpl',
      1 => 1434678494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695025006555619a448ec99-40156443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_555619a451adf0_21092238',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555619a451adf0_21092238')) {function content_555619a451adf0_21092238($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        </title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Darijan Vertovšek"/>
        <meta name="dcterms.created" content = "2015-03-11"/> 
        <link rel="stylesheet" type="text/css" href="css/dvertovs.css"/>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='js/jquery-1.11.3.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src='https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
        <script src='js/validacija.js'></script>
    </head>

    <body>
        <header id="zaglavlje">
            <h1 id='headerZaglavlje'>
                <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

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
