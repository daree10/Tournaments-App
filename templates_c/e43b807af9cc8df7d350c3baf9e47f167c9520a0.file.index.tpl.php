<?php /* Smarty version Smarty-3.1.18, created on 2015-05-15 18:02:01
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192168402355559a98ab4ef3-80715600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1431705654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192168402355559a98ab4ef3-80715600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55559a98b457a9_68833349',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55559a98b457a9_68833349')) {function content_55559a98b457a9_68833349($_smarty_tpl) {?>

        <nav id="izbornik"> 

            <ul>
                <li>
                    <a href="index.php">Početna</a>
                </li>
                
                <?php if (($_SESSION['tip_korisnika']==3)) {?>
                    <li><a href='popis_korisnika.php'>Popis korisnika</a></li>
                <?php }?>
                <?php if (($_SESSION['tip_korisnika']==1)) {?>
                    <li><a href='detalji_korisnika.php?kor=<?php echo $_SESSION['id_kor'];?>
'>Detalji</a></li>
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
