<?php /* Smarty version Smarty-3.1.18, created on 2015-05-15 17:48:09
         compiled from "prijava.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74333357255560b0b763be9-93091289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f3e2225683f55dcc72f0c65db9b511e2770f86d' => 
    array (
      0 => 'prijava.tpl',
      1 => 1431704569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74333357255560b0b763be9-93091289',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55560b0b7f1ae6_45621526',
  'variables' => 
  array (
    'errMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55560b0b7f1ae6_45621526')) {function content_55560b0b7f1ae6_45621526($_smarty_tpl) {?>        <nav id="izbornik"> 
            <ul>
                <li>
                    <a href="prijava.php">Prijava</a>
                </li>
                <li>
                    <a href="registracija.php">Registracija</a>
                </li>
            </ul>
        </nav>
        <section id="sadrzaj">
            <section id="greskalozinka">
                <?php if (isset($_smarty_tpl->tpl_vars['errMessage']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                <?php }?>
            </section>
            <article>
                <h1>Prijava</h1>
                <form method="POST" action="prijava.php">
                    <label for="korime">Korisničko ime (email)</label>
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
        </section>
        <footer>
            <div>
                <p>
                    <a href="http://validator.w3.org/check/referer" target="_blank" class="link-validacija">   
                        <img
                            src="http://www.rajtechnologies.com/images/html5-logo.png"
                            alt="Valid HTML5!" />
                    </a>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank" class="link-validacija">  
                        <img
                            src="http://jigsaw.w3.org/css-validator/images/vcss"
                            alt="Valid CSS!" />
                    </a>
                </p>
            </div>
            <div>Vrijeme potrebno za rješavanje aktivnog dokumenta: 1h</div>
            <div>Vrijeme potrebno za rješavanje cijelog rješenja: 13h</div>

        </footer>
    </body>
</html><?php }} ?>
