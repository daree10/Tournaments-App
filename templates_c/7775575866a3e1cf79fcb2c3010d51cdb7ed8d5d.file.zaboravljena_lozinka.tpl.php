<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 12:00:30
         compiled from "mojipredlosci/zaboravljena_lozinka.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1066024919556ae773070446-46810884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7775575866a3e1cf79fcb2c3010d51cdb7ed8d5d' => 
    array (
      0 => 'mojipredlosci/zaboravljena_lozinka.tpl',
      1 => 1434678494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1066024919556ae773070446-46810884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556ae7730dbab6_98363287',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556ae7730dbab6_98363287')) {function content_556ae7730dbab6_98363287($_smarty_tpl) {?>        <section id="sadrzaj">
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
                <section id="greska">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                </section>
            <?php }?>
            
            <article>
                <h1>Unesite vaše korisničko ime</h1>
                <form method="POST" action="zaboravljena_lozinka.php">
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" placeholder="Korisnicko ime" autofocus="autofocus"/>
                    <br>
                    <input type="submit" name="prijava" value="Pošaljite mi lozinku" class="gumb"/>
                </form>
            </article>
        </section><?php }} ?>
