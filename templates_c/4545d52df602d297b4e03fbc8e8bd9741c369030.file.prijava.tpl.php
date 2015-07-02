<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 03:48:52
         compiled from "mojipredlosci/prijava.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1569476118555619a451faf1-99696165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4545d52df602d297b4e03fbc8e8bd9741c369030' => 
    array (
      0 => 'mojipredlosci/prijava.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1569476118555619a451faf1-99696165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_555619a454f910_46596913',
  'variables' => 
  array (
    'errMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555619a454f910_46596913')) {function content_555619a454f910_46596913($_smarty_tpl) {?>        <section id="sadrzaj">
            <?php if (isset($_smarty_tpl->tpl_vars['errMessage']->value)) {?>
                <section id="greska">
                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                </section>
            <?php }?>
            
            <article>
                <h1>Prijava</h1>
                <form method="POST" action="prijava.php">
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" placeholder="Korisnicko ime" 
                        <?php if (isset($_COOKIE['korime'])) {?>
                                value = <?php echo $_COOKIE['korime'];?>

                        <?php }?> 
                    autofocus="autofocus"/>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" id="lozinka" placeholder="Lozinka"/>
                    <br>
                    <label for="zapamti">Zapamti me</label>
                    <input type="checkbox" name="zapamti" id="zapamti"/>
                    <input type="submit" name="prijava" value="Prijavi se" class="gumb"/>
                </form>
            </article>
            <article>
                Registriraj se <a href="registracija.php">ovdje</a>
            </article>
            <article>
                Zaboravio si lozinku? <a href="zaboravljena_lozinka.php">Klikni ovdje</a>
            </article>
        </section><?php }} ?>
