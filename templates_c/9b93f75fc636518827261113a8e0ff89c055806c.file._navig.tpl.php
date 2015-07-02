<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 03:48:52
         compiled from "mojipredlosci/_navig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1101074742556c74d1d565f6-28662301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b93f75fc636518827261113a8e0ff89c055806c' => 
    array (
      0 => 'mojipredlosci/_navig.tpl',
      1 => 1434678494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1101074742556c74d1d565f6-28662301',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556c74d1d96d31_99773266',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c74d1d96d31_99773266')) {function content_556c74d1d96d31_99773266($_smarty_tpl) {?><nav id="izbornik"> 
            <ul>
                <?php if (isset($_SESSION['id_kor'])) {?>
                    
                <li><a href="index.php">Početna</a></li>
                <li><a href="popis_timova.php">Popis timova</a></li>
                
                <?php if (($_SESSION['tip_korisnika']==3)) {?>
                    <li><a href='popis_korisnika.php'>Popis korisnika</a></li>
                    <li><a href='kategorije.php'>Kategorije</a></li>
                    <li><a href='pomak_vremena.php'>Pomak vremena</a></li>
                    <li><a href='dnevnik.php'>Dnevnik</a></li>
                <?php }?>
                
                <?php if (($_SESSION['tip_korisnika']==3)||($_SESSION['tip_korisnika']==2)) {?>
                    <li><a href='turniri.php'>Dodavanje turnira</a></li>
                    <li><a href='zahtjevi.php'>Zahtjevi</a></li>
                <?php }?>
                
                <?php if (($_SESSION['tip_korisnika']==1)||($_SESSION['tip_korisnika']==2)) {?>
                    <li><a href='detalji_korisnika.php?kor=<?php echo $_SESSION['id_kor'];?>
'>Detalji</a></li>
                <?php }?>
                
                <?php } else { ?>
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                <?php }?>
                <li><a href="turniri_reg.php">Turniri</a></li>
                <li><a href="o_autoru.html">O autoru</a></li>
                <li><a href="dokumentacija.html">Dokumentacija</a></li>
            </ul>
        </nav><?php }} ?>
