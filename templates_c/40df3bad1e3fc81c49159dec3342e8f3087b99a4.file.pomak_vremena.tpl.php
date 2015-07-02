<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 11:58:20
         compiled from "mojipredlosci/pomak_vremena.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6266092905581ae9f90f304-09115516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40df3bad1e3fc81c49159dec3342e8f3087b99a4' => 
    array (
      0 => 'mojipredlosci/pomak_vremena.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6266092905581ae9f90f304-09115516',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5581ae9f977110_23967129',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5581ae9f977110_23967129')) {function content_5581ae9f977110_23967129($_smarty_tpl) {?><script>
    $.ajax({
            url: "http://arka.foi.hr/WebDiP/pomak_vremena/pomak.php",
            context: document.body,
            dataType: "json",
            type: "GET",
            data:
                    {
                        format: "json"
                    },
            success: function (json)
            {
                $("#pomak").val(json.WebDiP.vrijeme.pomak.brojSati);
            },
            error: function () {
            }
        });
    
    </script>

<section id="sadrzaj">
            
    <a href='http://arka.foi.hr/WebDiP/pomak_vremena/vrijeme.html'>Postavljanje virtualnog vremena</a>
    
    <form method='post' action='pomak_vremena.php'>
        <label for="pomak">Pomak sata</label>
        <input type='text' name='pomak' id='pomak' value='' readonly/>
        <input type='submit' name='preuzmi' value='Preuzmi vrijeme'/>
    </form>
        </section><?php }} ?>
