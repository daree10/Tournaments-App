<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 12:02:42
         compiled from "mojipredlosci/turniri.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13504839085570237c1a39c8-71194823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e966037a71c6e26ef73b268b9d41b0d4ed1ec331' => 
    array (
      0 => 'mojipredlosci/turniri.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13504839085570237c1a39c8-71194823',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5570237c1fe519_23465011',
  'variables' => 
  array (
    'errMessage' => 0,
    'naziv_ponovo' => 0,
    'pravila_ponovo' => 0,
    'br_sud_ponovo' => 0,
    'datpoc_ponovo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5570237c1fe519_23465011')) {function content_5570237c1fe519_23465011($_smarty_tpl) {?>
    <script src ='js/turniriAJAX.js'></script>
    <script src ='js/validacijav2.js'></script>
    <script>
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
        function turniriCRUDAjax(fieldNo, fieldVal, idTurnir)
        {
            var fieldName = "";
            switch(fieldNo)
            {
                case 1: fieldName = "naziv";
                    break;
                case 2: fieldName = "pravila";
                    break;
                case 3: fieldName = "maxnatjecatelja";
                    break;
                case 4: fieldName = "datum_pocetka";
                    break;
            }
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/turniriCRUDAPI.php",
                context: document.body,
                dataType: "json",
                type: "POST",
                data:
                        {
                            fieldName: fieldName,
                            fieldVal: fieldVal,
                            idTurnir: idTurnir
                        },
                success: function (json)
                {
                    if(json.uspjeh != "true")
                    {
                        alert(json.uspjeh);
                    }
                    if(json.naziv != "")
                    {
                        $("#naziv"+idTurnir).val(json.naziv);
                    }
                },
                error: function () {
                }
            });
        }
        function winTournament(idTurnir, idTim)
        {
            $.ajax({
                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/winAPI.php",
                context: document.body,
                dataType: "json",
                type: "POST",
                data:
                        {
                            idTeam: idTim,
                            idTournament: idTurnir
                        },
                success: function (json)
                {
                    location.reload();
                },
                error: function () {
                }
            });
        }
    </script>

<iframe onload="getKategorijaByMod(<?php echo $_SESSION['id_kor'];?>
,'true');" style = "display:none;" src="#"></iframe>

<section id="sadrzaj">
    <div id="greska">
                    <?php echo $_smarty_tpl->tpl_vars['errMessage']->value;?>

                </div>
    <form class = tournament action="turniri.php" method="POST">
            <section>
                <label for="kategorija">Kategorija: </label>
                <select onchange = "getTurniriAJAX(this.options[this.selectedIndex].value,<?php echo $_SESSION['id_kor'];?>
);" name="kategorija" id="kategorija">

                </select>  
            </section> 
            <h1>Novi turnir</h1>
                 <label for="naziv">Naziv turnira</label>
                 <input type="text" name="naziv" id="naziv" size="20" maxlength="50"
                     <?php if (isset($_smarty_tpl->tpl_vars['naziv_ponovo']->value)) {?>
                        value="<?php echo $_smarty_tpl->tpl_vars['naziv_ponovo']->value;?>
"
                     <?php }?>
                 ><br>
                 <label for="pravila">Pravila</label>
                 <textarea rows="10" cols="45" name="pravila" id="pravila"><?php if (isset($_smarty_tpl->tpl_vars['pravila_ponovo']->value)) {?><?php echo $_smarty_tpl->tpl_vars['pravila_ponovo']->value;?>
<?php }?></textarea><br>
                 <label for="br_sud">Max broj sudionika</label>
                 <input type="number" name="br_sud" id="br_sud" size="20" maxlength="50"
                 <?php if (isset($_smarty_tpl->tpl_vars['br_sud_ponovo']->value)) {?>
                        value="<?php echo $_smarty_tpl->tpl_vars['br_sud_ponovo']->value;?>
"
                 <?php }?>
                 ><br>
                 <label for="datpoc">Datum početka</label>
                 <input type="date" name="datpoc" id="datpoc"
                 <?php if (isset($_smarty_tpl->tpl_vars['datpoc_ponovo']->value)) {?>
                        value="<?php echo $_smarty_tpl->tpl_vars['datpoc_ponovo']->value;?>
"
                 <?php }?>
                 ><br>
                 <input style="width:89%;" type="submit" name="addTurnir" value="Dodaj turnir">
        </form>
                 <h1>Turniri odabrane kategorije</h1>
                 <section id="turniri">

            </section> 
            
            <section id ="dialogSpace" style="display:none;">
                     
                 </section>
        </section>
                 
                 <?php }} ?>
