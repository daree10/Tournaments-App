<?php /* Smarty version Smarty-3.1.18, created on 2015-05-15 08:54:54
         compiled from "predlosci/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9361458145551d25d111671-40705873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '998f2e7db44d2369713e09ac4d702256a2b2073a' => 
    array (
      0 => 'predlosci/index.tpl',
      1 => 1431672892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9361458145551d25d111671-40705873',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5551d25d187f75_16925602',
  'variables' => 
  array (
    'zaglavlje' => 0,
    'link_popisKor_admin' => 0,
    'link_detaljiKor_regkor' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5551d25d187f75_16925602')) {function content_5551d25d187f75_16925602($_smarty_tpl) {?><?php if (!isset($_SESSION['id_kor'])) {?>
        
            <script>
                window.location.replace("prijava.php");
            </script>
        
<?php }?>
<!DOCTYPE html>
<html>
    <head>
        <title>Početna stranica</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Darijan Vertovšek"/>
        <meta name="dcterms.created" content = "2015-03-11"/> 
        <link rel="stylesheet" type="text/css" href="css/dvertovs.css"/>
    </head>

    <body>
        <header id="zaglavlje">
            <h1>Početna stranica</h1> 
            <div style="text-align: center;">
                <?php echo $_smarty_tpl->tpl_vars['zaglavlje']->value;?>

                <a style="margin-left: 20%" href="odjava.php">Odjava</a>
            </div>
        </header>

        <nav id="izbornik"> 

            <ul>
                <li>
                    <a href="index.php">Početna</a>
                </li>
                
                <?php if (($_SESSION['tip_korisnika']==3)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['link_popisKor_admin']->value;?>

                <?php }?>
                <?php if (($_SESSION['tip_korisnika']==1)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['link_detaljiKor_regkor']->value;?>

                <?php }?>
            </ul>
        </nav>

        <section id="sadrzaj">
            <h1>Osnovne informacije o kolegiju</h1>
            <p>Cilj kolegija je upoznavanje studenata s elementima dizajna web stranica i razvoja web aplikacija. Predmetom se obrađuju glavni elementi koji čine pojedinačne sastavne komponente cjelovitog projektnog rješenja na web platformi. Predmet prati moguće razine realizacije Web projekata tako da se studentima pruža uvid u različite tehnološke mogućnosti koje mogu primijeniti u konkretnim situacijama.</p>
            <p>Studenti tijekom praktičnog dijela kolegija rade vježbe kojima postepeno razvijaju pojedine gradive blokove kasnijih web stranica i aplikacija. Prezentacijom izabranih rješenja otvara se diskusija tijekom koje studenti mogu izraziti svoje mišljenje o dizajnu, dovršenosti i drugim dogovorenim kriterijima kvalitete, čime se potiče kritičko razmišljanje o tuđem i vlastitom rješenju</p>
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
            <div>Vrijeme potrebno za rješavanje aktivnog dokumenta: 4h</div>
            <div>Vrijeme potrebno za rješavanje cijelog rješenja: 19.5h</div>

        </footer>
    </body>
</html><?php }} ?>
