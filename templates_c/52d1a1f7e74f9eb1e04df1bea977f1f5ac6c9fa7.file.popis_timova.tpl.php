<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 11:59:57
         compiled from "mojipredlosci/popis_timova.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1256968961558145e62c3776-24684137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52d1a1f7e74f9eb1e04df1bea977f1f5ac6c9fa7' => 
    array (
      0 => 'mojipredlosci/popis_timova.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1256968961558145e62c3776-24684137',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_558145e62f9465_20096710',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558145e62f9465_20096710')) {function content_558145e62f9465_20096710($_smarty_tpl) {?>                    <script>
                        $.ajax({
                                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/timoviAPI.php",
                                context: document.body,
                                dataType: "json",
                                type: "POST",
                                data:
                                        {
                                            idUser: <?php echo $_SESSION['id_kor'];?>
,
                                            userType: <?php echo $_SESSION['tip_korisnika'];?>

                                        },
                                success: function (json)
                                {
                                    var dodati = "<table id ='datatabla'>";
                                            dodati += "<thead>";
                                            dodati += "<th>";
                                            dodati += "Naziv tima";
                                            dodati += "</th>";
                                            dodati += "<th>";
                                            dodati += "Opis tima";
                                            dodati += "</th>";
                                            dodati += "</thead>";
                                            dodati += "<tbody>";

                                            $.each(json, function (key, val)
                                            {
                                                dodati += "<tr>";
                                                dodati += "<td>";
                                                dodati += "<a href='timovi.php?idTim=" + val.id + "'>"+val.nazivtima+"</a>";
                                                dodati += "</td>";
                                                dodati += "<td>";
                                                dodati += val.opistima;
                                                dodati += "</td>";
                                            });
                                            dodati += "</tbody>";
                                            dodati += "</table>";

                                            $("#tablica").html(dodati);
                                            $('#datatabla').DataTable();
                                },
                                error: function () {
                                }
                            });
                            
                                    
                               
                    </script>
                <style>
                        input
                        {
                            width:100%;
                        }
                    </style>
        <section id="sadrzaj">
            <section id="tablica">
                  
            </section> 
        </section>
                <?php }} ?>
