<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 12:00:01
         compiled from "mojipredlosci/popis_korisnika.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171245107255564e750546a1-36003347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83a97ba779153de91585716d0c90b783d1b15fed' => 
    array (
      0 => 'mojipredlosci/popis_korisnika.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171245107255564e750546a1-36003347',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55564e750de3a1_40796605',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55564e750de3a1_40796605')) {function content_55564e750de3a1_40796605($_smarty_tpl) {?>                
                    <script src = 'js/korisniciAJAX.js'></script>
                    <script>
                        getKorisnici();
                    </script>
                
                
        <section id="sadrzaj">
            <section>
                <label style="float:none;" for='userNameSearch'>Pretraživanje: </label><input type='text' name='korime' id='userNameSearch' size='30' maxlength='50'><br>   
            </section> 
            <section id="tablica">
                  
            </section> 
        </section>
                
        
                
                <?php }} ?>
