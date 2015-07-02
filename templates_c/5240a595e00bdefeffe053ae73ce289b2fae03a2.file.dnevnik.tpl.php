<?php /* Smarty version Smarty-3.1.18, created on 2015-06-19 12:06:05
         compiled from "mojipredlosci/dnevnik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9284418285582616fc7ed08-99880294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5240a595e00bdefeffe053ae73ce289b2fae03a2' => 
    array (
      0 => 'mojipredlosci/dnevnik.tpl',
      1 => 1434678493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9284418285582616fc7ed08-99880294',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5582616fc80527_43300601',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582616fc80527_43300601')) {function content_5582616fc80527_43300601($_smarty_tpl) {?>                    <script>
                         function logTable(datumOd,datumDo,kor_id){
                         $.ajax({
                                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/logAPI.php",
                                context: document.body,
                                dataType: "json",
                                type: "POST",
                                data:
                                        {
                                            dateFrom: datumOd,
                                            dateTo: datumDo,
                                            userID: kor_id,
                                            graph: ""
                                        },
                                success: function (json)
                                {
                                    var dodati = "<table id ='datatabla'>";
                                            dodati += "<thead>";
                                            dodati += "<th>";
                                            dodati += "Vrijeme";
                                            dodati += "</th>";
                                            dodati += "<th>";
                                            dodati += "Tip zahtjeva";
                                            dodati += "</th>";
                                            dodati += "<th>";
                                            dodati += "Opis zahtjeva";
                                            dodati += "</th>";
                                            dodati += "<th>";
                                            dodati += "Korisnik";
                                            dodati += "</th>";
                                            dodati += "</thead>";
                                            dodati += "<tbody>";

                                            $.each(json, function (key, val)
                                            {
                                                dodati += "<tr>";
                                                dodati += "<td>";
                                                dodati += val.vrijeme;
                                                dodati += "</td>";
                                                dodati += "<td>";
                                                dodati += val.tipzahtjev;
                                                dodati += "</td>";
                                                dodati += "<td>";
                                                dodati += val.opiszahtjev;
                                                dodati += "</td>";
                                                dodati += "<td>";
                                                dodati += "<a href='detalji_korisnika.php?kor=" + val.id_kor + "'>"+val.korime+"</a>";
                                                dodati += "</td>";
                                            });
                                            dodati += "</tbody>";
                                            dodati += "</table>";

                                            $("#tablica").html(dodati);
                                            $('#datatabla').DataTable();
                                            
                                            

                                            canvasStatistics(datumOd,datumDo,kor_id);
                                },
                                error: function () {
                                }
                            });   
                        }
                        function canvasStatistics(datumOd,datumDo,kor_id)
                        {
                            $.ajax({
                                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/logAPI.php",
                                context: document.body,
                                dataType: "json",
                                type: "POST",
                                data:
                                        {
                                            dateFrom: datumOd,
                                            dateTo: datumDo,
                                            userID: kor_id,
                                            graph: "true"
                                        },
                                success: function (json)
                                {
                                    var dodati = "";
                                    dodati += "<canvas id='statistikaCanvas' width='900' height='100' style='border:1px solid #000000;'>";
                                    dodati += "Your browser does not support the HTML5 canvas tag.";
                                    dodati += "</canvas>";  
                                    
                                    $("#canvas").html(dodati);
                                    var c = document.getElementById("statistikaCanvas");
                                    var ctx = c.getContext("2d");

                                            ctx.fillStyle = "#FF0000";
                                            ctx.fillRect(0,0,json.br_neuspjesna*2,50);
                                            ctx.font = "20px Arial";
                                            ctx.fillStyle = "black";
                                            ctx.fillText("Neuspjesne ("+json.br_neuspjesna+")",0,30);

                                            ctx.fillStyle = "#66FF66";
                                            ctx.fillRect(0,50,json.br_uspjesna*2,50);
                                            ctx.font = "20px Arial";
                                            ctx.fillStyle = "black";
                                            ctx.fillText("Uspjesne ("+json.br_uspjesna+")",0,75);
                                },
                                error: function () {
                                }
                            });   
                        }
                        function dateListener()
                        {
                            logTable($("#datumod").val(),$("#datumdo").val(),$("#korisnici").val());
                        }
                        logTable("","","");
                        $.ajax({
                                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/usersAPI.php",
                                context: document.body,
                                dataType: "json",
                                type: "POST",
                                data:
                                        {
                                        },
                                success: function (json)
                                {
                                    var dodati = "<option value=''>";
                                    dodati += "Svi korisnici";
                                    dodati += "</option>";
                                    $.each(json, function (key, val)
                                            {
                                                dodati += "<option value='"+val.id+"'>";
                                                dodati += val.korime;
                                                dodati += "</option>";
                                            });
                                            
                                   $("#korisnici").html(dodati);
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
            <label for="datumod">Početni datum: </label><input id="datumod" type="date" onchange="dateListener();"/>
            <label for="datumdo">Završni datum: </label><input id="datumdo" type="date" onchange="dateListener();"/>
            <label for="korisnici">Korisnik: </label><select id="korisnici" onchange="dateListener();"></select>
            <section id="tablica">
                  
            </section> 
            <section id="canvas">
                  
            </section> 
                  
           
        </section><?php }} ?>
