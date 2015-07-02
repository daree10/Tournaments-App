<?php /* Smarty version Smarty-3.1.18, created on 2015-05-12 10:01:57
         compiled from "predlosci/vrijeme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9665067095551b3751a7f58-69724086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8a78a938e8153ff406e855e231c311e2047f9f7' => 
    array (
      0 => 'predlosci/vrijeme.tpl',
      1 => 1422990441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9665067095551b3751a7f58-69724086',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vrijeme' => 0,
    'salji' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5551b375234a32_46210327',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5551b375234a32_46210327')) {function content_5551b375234a32_46210327($_smarty_tpl) {?><?php if (isset($_POST['salji'])) {?>
    Pomak vremena: <?php echo $_smarty_tpl->tpl_vars['vrijeme']->value;?>

<?php } else { ?>
    <form action=vrijeme.php method="POST">
      <input type="submit" name='salji' value='<?php echo $_smarty_tpl->tpl_vars['salji']->value;?>
'>
    </form>
<?php }?>
<?php }} ?>
