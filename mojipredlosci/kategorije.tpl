{literal}
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
{/literal}


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
        </section>