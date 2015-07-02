<?php /* Smarty version Smarty-3.1.18, created on 2015-05-12 10:01:51
         compiled from "predlosci/prijava.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7063999025551b36f535404-56734713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '621f2af72515b42b65f289dfd76e3d7d444a877d' => 
    array (
      0 => 'predlosci/prijava.tpl',
      1 => 1423140257,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7063999025551b36f535404-56734713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'lozinka' => 0,
    'salji' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5551b36f548d58_72885484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5551b36f548d58_72885484')) {function content_5551b36f548d58_72885484($_smarty_tpl) {?><form action=vrijeme.php method="POST">
    <label for="kIme"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 </label><input type="text" name="kIme" /> <br />
    <label for="lozinka"><?php echo $_smarty_tpl->tpl_vars['lozinka']->value;?>
</label><input type="password" name="lozinka" /> <br />
  <input type="submit" value='<?php echo $_smarty_tpl->tpl_vars['salji']->value;?>
'>
</form>
<?php }} ?>
