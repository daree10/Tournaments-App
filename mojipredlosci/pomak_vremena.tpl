<script>
    $.ajax({
            url: "http://arka.foi.hr/WebDiP/pomak_vremena/pomak.php",
            context: document.body,
            dataType: "json",
            type: "GET",
            data:
                    {
                        format: "json"
                    },
            success: function (json)
            {
                $("#pomak").val(json.WebDiP.vrijeme.pomak.brojSati);
            },
            error: function () {
            }
        });
    
    </script>

<section id="sadrzaj">
            
    <a href='http://arka.foi.hr/WebDiP/pomak_vremena/vrijeme.html'>Postavljanje virtualnog vremena</a>
    
    <form method='post' action='pomak_vremena.php'>
        <label for="pomak">Pomak sata</label>
        <input type='text' name='pomak' id='pomak' value='' readonly/>
        <input type='submit' name='preuzmi' value='Preuzmi vrijeme'/>
    </form>
        </section>