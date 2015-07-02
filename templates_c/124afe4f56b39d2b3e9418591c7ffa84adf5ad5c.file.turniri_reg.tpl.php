<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 11:51:14
         compiled from "mojipredlosci/turniri_reg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20403481265571c95bc86d31-90115947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '124afe4f56b39d2b3e9418591c7ffa84adf5ad5c' => 
    array (
      0 => 'mojipredlosci/turniri_reg.tpl',
      1 => 1434678494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20403481265571c95bc86d31-90115947',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5571c95bcf00e3_61210548',
  'variables' => 
  array (
    'title' => 0,
    'errMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5571c95bcf00e3_61210548')) {function content_5571c95bcf00e3_61210548($_smarty_tpl) {?>
    <script src ='js/turniriAJAX.js'></script>
    <script>
        getTurniriAJAXreg('');
        function showTeams(idTurnir)
        {
            
            $( "#dialog"+idTurnir ).dialog({
                //height: 50,
                //width: 350,
                modal: true,
                resizable: true,
                dialogClass: 'no-close moderator-dialog'
            });
        }
    </script>


<?php if (isset($_SESSION['id_kor'])!=isset($_smarty_tpl->tpl_vars['title']->value)) {?>
<style>
    .skrivenozanereg
    {
        display:none;
    }
</style>
<?php } else { ?>
    <style>
    .skrivenozareg
    {
        display:none;
    }
</style>
<?php }?>

<iframe onload="getKategorija();" style = "display:none;" src="#"></iframe>

<section id="sadrzaj">
    <div id="greska">
                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                </div>
                <select onchange = "getTurniriAJAXreg(this.options[this.selectedIndex].value);" name="kategorija" id="kategorija">

                </select>  
                 <h1>Turniri</h1>
                 <section id="turniri">

            </section> 
            
            <section id ="dialogSpace" style="display:none;">
                     
                 </section>
        </section><?php }} ?>
