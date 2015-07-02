{literal}
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
{/literal}

{if isset($smarty.session.id_kor) neq isset($title)}
<style>
    .skrivenozanereg
    {
        display:none;
    }
</style>
{else}
    <style>
    .skrivenozareg
    {
        display:none;
    }
</style>
{/if}

<iframe onload="getKategorija();" style = "display:none;" src="#"></iframe>

<section id="sadrzaj">
    <div id="greska">
                    {$errMessage}
                </div>
                <select onchange = "getTurniriAJAXreg(this.options[this.selectedIndex].value);" name="kategorija" id="kategorija">

                </select>  
                 <h1>Turniri</h1>
                 <section id="turniri">

            </section> 
            
            <section id ="dialogSpace" style="display:none;">
                     
                 </section>
        </section>