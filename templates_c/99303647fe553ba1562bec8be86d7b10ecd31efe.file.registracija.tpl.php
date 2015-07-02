<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 11:15:08
         compiled from "mojipredlosci/registracija.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198054232055563891e6ad81-39478939%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99303647fe553ba1562bec8be86d7b10ecd31efe' => 
    array (
      0 => 'mojipredlosci/registracija.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198054232055563891e6ad81-39478939',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55563891ed55a5_24711244',
  'variables' => 
  array (
    'errMessage' => 0,
    'korime_ponovo' => 0,
    'ime_ponovo' => 0,
    'prezime_ponovo' => 0,
    'email_ponovo' => 0,
    'datum_ponovo' => 0,
    'grad_ponovo' => 0,
    'spol_ponovo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55563891ed55a5_24711244')) {function content_55563891ed55a5_24711244($_smarty_tpl) {?>        <section id="sadrzaj"> 
                <div id="greska">
                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                </div>
            <article>
                <h1>Registriraj se</h1>
                <form id="registracija" action="registracija.php" method="POST" enctype="multipart/form-data">
                    <div id="korime_zauzeto">
                        
                    </div>
                    <label for="korime">Korisničko ime</label>
                    <input type="text" name="korime" id="korime" size="20" maxlength="50" 
                        <?php if (isset($_smarty_tpl->tpl_vars['korime_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['korime_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" id="lozinka" size="20"><br>
                    <label for="lozinka2">Ponovite lozinku</label>
                    <input type="password" name="lozinka2" id="lozinka2" size="20"><br>
                    <label for="ime">Ime</label>
                    <input type="text" name="ime" id="ime" size="20" maxlength="30"
                        <?php if (isset($_smarty_tpl->tpl_vars['ime_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['ime_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="prezime">Prezime</label>
                    <input type="text" name="prezime" id="prezime" size="20" maxlength="50"             
                    <?php if (isset($_smarty_tpl->tpl_vars['prezime_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['prezime_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" size="20" maxlength="50" 
                        <?php if (isset($_smarty_tpl->tpl_vars['email_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['email_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="datrodj">Datum rođenja</label>
                    <input type="date" name="datrodj" id="datrodj"
                    <?php if (isset($_smarty_tpl->tpl_vars['datum_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['datum_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="zupanija">Županija</label>
                        <select name="zupanija" id="zupanija">
                            <option value="Vukovarsko-srijemska">Vukovarsko-srijemska</option>
                            <option value="Brodsko-posavska">Brodsko-posavska</option>
                            <option value="Osječko baranjska">Osječko baranjska</option>
                            <option value="Požeško-slavonska">Požeško-slavonska</option>
                            <option value="Virovitičko-podravska">Virovitičko-podravska</option>
                            <option value="Bjelovarsko-bilogorska">Bjelovarsko-bilogorska</option>
                            <option value="Sisačko-moslavačka">Sisačko-moslavačka</option>
                            <option value="Zagrebačka">Zagrebačka</option>
                            <option value="Grad Zagreb">Grad Zagreb</option>
                            <option value="Koprivničko-križevačka">Koprivničko-križevačka</option>
                            <option value="Međimurska">Međimurska</option>
                            <option value="Varaždinska" selected>Varaždinska</option>
                            <option value="Krapinsko-zagorska">Krapinsko-zagorska</option>
                            <option value="Karlovačka">Karlovačka</option>
                            <option value="Primorsko-goranska">Primorsko-goranska</option>
                            <option value="Istarska">Istarska</option>
                            <option value="Ličko-senjska">Ličko-senjska</option>
                            <option value="Zadarska">Zadarska</option>
                            <option value="Šibensko-kninska">Šibensko-kninska</option>
                            <option value="Splitsko-dalmatinska">Splitsko-dalmatinska</option>
                            <option value="Dubrovačko-neretvanska">Dubrovačko-neretvanska</option>
                        </select>
                    <label for="grad">Grad</label>
                    <input type="text" name="grad" id="grad" size="20" maxlength="50"
                    <?php if (isset($_smarty_tpl->tpl_vars['grad_ponovo']->value)) {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['grad_ponovo']->value;?>
"
                        <?php }?>
                    ><br>
                    <label for="slika">Slika</label>
                    <input type="file" name="slika" id="slika"><br>
                    <label for="spol">Muski</label>
                    <input type="radio" name="spol" id="spol" value="mus"
                    <?php if (isset($_smarty_tpl->tpl_vars['spol_ponovo']->value)) {?>
                        <?php if ($_smarty_tpl->tpl_vars['spol_ponovo']->value=="mus") {?>
                            checked
                        <?php }?>
                    <?php }?>       
                    >
                    <label for="spol2">Zenski</label>
                    <input type="radio" name="spol" id="spol2" value="zen"
                    <?php if (isset($_smarty_tpl->tpl_vars['spol_ponovo']->value)) {?>
                        <?php if ($_smarty_tpl->tpl_vars['spol_ponovo']->value=="zen") {?>
                            checked
                        <?php }?>
                    <?php }?>              
                    >
                    <div class="g-recaptcha" data-sitekey="6Lc3OgYTAAAAADMWBFt_DRo92k_pQVIWTuYBbbdN"></div>
                    <input type="submit" name="registracija" value="Registracija" class="gumb">
                    <input type="reset" value="Brisanje formulara" class="gumb">
                </form>
            </article>
        </section><?php }} ?>
