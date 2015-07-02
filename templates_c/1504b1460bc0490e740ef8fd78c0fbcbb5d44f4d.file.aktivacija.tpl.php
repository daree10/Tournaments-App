<?php /* Smarty version Smarty-3.1.18, created on 2015-05-16 14:18:54
         compiled from "mojipredlosci/aktivacija.tpl" */ ?>
<?php /*%%SmartyHeaderCode:349994415557345fc45239-18095067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1504b1460bc0490e740ef8fd78c0fbcbb5d44f4d' => 
    array (
      0 => 'mojipredlosci/aktivacija.tpl',
      1 => 1431778733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '349994415557345fc45239-18095067',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5557345fcb4010_56031400',
  'variables' => 
  array (
    'poruka' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5557345fcb4010_56031400')) {function content_5557345fcb4010_56031400($_smarty_tpl) {?>        <nav id="izbornik"> 
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
            <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
                    <div id="greskalozinka">
                        <?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>

                    </div>
            <?php }?>
        </section>
    </section><?php }} ?>
