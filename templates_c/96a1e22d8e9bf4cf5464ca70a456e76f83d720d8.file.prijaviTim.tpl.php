<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 12:03:28
         compiled from "mojipredlosci/prijaviTim.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91041153555744c773261e8-94166070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96a1e22d8e9bf4cf5464ca70a456e76f83d720d8' => 
    array (
      0 => 'mojipredlosci/prijaviTim.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91041153555744c773261e8-94166070',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55744c773aaad8_72251192',
  'variables' => 
  array (
    'errMessage' => 0,
    'sMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55744c773aaad8_72251192')) {function content_55744c773aaad8_72251192($_smarty_tpl) {?>
    <script src ='js/validacijav2.js'></script>

<section id="sadrzaj">
            
                <section id="greska">

                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                    
                </section>
           
            <section id="successMessage">

                    <?php echo $_smarty_tpl->tpl_vars['sMessage']->value;?>

                    
                </section>
            <article>
                <h1>Prijava timova</h1>
                <form method="POST" action="prijaviTim.php?idTurnir=<?php echo $_GET['idTurnir'];?>
">
                    <label for="nazivtima">Naziv tima</label>
                    <input type="text" name="nazivtima" id="nazivtima" placeholder="Naziv tima" autofocus="autofocus"/><br>
                    <label for="opistima">Opis tima</label>
                    <textarea rows="10" cols="45" name="opistima" id="opistima"></textarea><br>
                    <input type="submit" name="prijava" value="Prijavi tim"/>
                </form>
            </article>
            <article>
                Pogledaj dostupne turnire <a href="turniri_reg.php">ovdje</a>
            </article>
        </section><?php }} ?>
