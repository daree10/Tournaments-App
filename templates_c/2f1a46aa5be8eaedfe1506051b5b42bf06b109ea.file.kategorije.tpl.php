<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 04:49:33
         compiled from "mojipredlosci/kategorije.tpl" */ ?>
<?php /*%%SmartyHeaderCode:582931230556c7e1ef1af95-19995007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f1a46aa5be8eaedfe1506051b5b42bf06b109ea' => 
    array (
      0 => 'mojipredlosci/kategorije.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '582931230556c7e1ef1af95-19995007',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556c7e1f02f312_75592051',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c7e1f02f312_75592051')) {function content_556c7e1f02f312_75592051($_smarty_tpl) {?>
    <script src ='js/turniriAJAX.js'></script>
    <script>
        getKategorije("kategorija", "");
        function showDialog(idKat)
        {
            $( "#dialog"+idKat ).dialog({
                //height: 50,
                //width: 350,
                modal: true,
                resizable: true,
                dialogClass: 'no-close moderator-dialog'
            });
        }
        
        function deleteCategory(idKat)
        {
            if(confirm("Jeste li sigurni da želite obrisati odabranu kategoriju?"))
                    {
                        deleteCategoryAJAX(idKat);
                    }
        }
        
        function deleteMod(idKat,idMod)
        {
            if(confirm("Jeste li sigurni da želite obrisati moderatora?"))
                    {
                        $( "#dialog"+idKat ).dialog("close");
                        deleteModCategoryAJAX(idKat,idMod);
                    }
        }
        
        $(document).ready(function () {
                $("#submitCategoryButton").click(function () {
                    var newCategory = $("#addCategory").val();
                    if(newCategory !== "")
                    {
                        if(confirm("Jeste li sigurni da želite dodati kategoriju "+newCategory+" ?"))
                        {
                            $("#addCategory").val("");
                            addCategoryAJAX(newCategory);
                        }
                }
            });
        });
    </script>



<section id="sadrzaj">
            <section>
                <label style="float:none;" for='categorySearch'>Pretraživanje: </label><input type='text' name='categorySearch' id='categorySearch' size='30' maxlength='50'><br>   
            </section> 
            <section id="kat">
                
            </section> 
    
            <section class = category>
                <input style="float:left;" type='text' name='addCategory' id='addCategory' size='30' maxlength='50'>
                <button id="submitCategoryButton" ><span style="float:left;" class="ui-icon ui-icon-circle-plus"></span>Dodaj kategoriju</button>
            </section>
    
            <section id="dialogSpace" style="display:none;">
                
            </section> 
        </section><?php }} ?>
