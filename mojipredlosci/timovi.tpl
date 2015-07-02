<script src='js/teammaterialAJAX.js'></script>
<script>
    getPicsAJAX({$smarty.get.idTim});
    getVidsAJAX({$smarty.get.idTim});
    getDocsAJAX({$smarty.get.idTim});
    getCommentsAJAX({$smarty.get.idTim});
    
    function rateTeam(rating, idUser, idTeam)
    {            
            $.ajax({
            url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/ratingAPI.php",
            context: document.body,
            dataType: "json",
            type: "POST",
            data:
                    {
                        idTeam: idTeam,
                        idUser: idUser,
                        rating: rating
                    },
            success: function (json)
            {
                $("#ocjena").val(json.averageRating);
                
                $("#ratingSystem").val(json.selectedRating);
            },
            error: function () {
            }
        });
    }
    rateTeam('',{$smarty.session.id_kor},{$smarty.get.idTim});
    
    $.ajax({
            url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/timoviAPI.php",
            context: document.body,
            dataType: "json",
            type: "POST",
            data:
                    {
                        idTeam: {$smarty.get.idTim}
                    },
            success: function (json)
            {
                $.each(json, function (key, val)
                {
                $("#nazivtima").val(val.nazivtima);
                $("#opistima").val(val.opistima);
                $("#predstavnik").val(val.korime+"("+val.ime+" "+val.prezime+")");
                $("#turnir").val(val.nazivturnira);
            });
                
            },
            error: function () {
            }
        });
</script>

<style type="text/css">
	.thumbnails img {
		height: 80px;
		border: 4px solid #555;
		padding: 1px;
		margin: 0 10px 10px 0;
	}

	.thumbnails img:hover {
		border: 4px solid #00ccff;
		cursor:pointer;
	}

	.preview img {
		border: 4px solid #444;
		padding: 1px;
		width: 400px;
                height: 400px;
	}
</style>

<section id="sadrzaj">
            {if isset($errMessage)}
                <section id="greska">
                    {$errMessage}
                </section>
            {/if}
            
            <article>
                <h1>Podaci o timu</h1>
                <form method="POST" action="timovi.php?idTim={$smarty.get.idTim}">
                    <label for="nazivtima">Naziv tima</label>
                    <input type="text" name="nazivtima" id="nazivtima" value="" {if $smarty.session.tip_korisnika eq 3}required {else} readonly{/if}>
                    <br>
                    <label for="opistima">Opis tima</label>
                    <input type="text" name="opistima" id="opistima" value="" {if $smarty.session.tip_korisnika eq 3}required {else} readonly{/if}>
                    <br>
                    <label for="predstavnik">Predstavnik</label>
                    <input type="text" name="predstavnik" id="predstavnik" value="" readonly>
                    <label for="turnir">Turnir</label>
                    <input type="text" name="turnir" id="turnir" value="" readonly>
                    <br>
                    {if $smarty.session.tip_korisnika eq 3}
                    <input type="submit" name="izmjena" value="Izmijeni" class="gumb"/>
                    {/if}
                </form>
               
                <section class="category"> 
                <label for="ocjena">Ocjena</label>
                <input type="text" name="ocjena" id="ocjena" value="" readonly>
                <label for ="ratingSystem">Vaša ocjena</label>
                    <select id="ratingSystem" onchange='rateTeam(this.options[this.selectedIndex].value,{$smarty.session.id_kor},{$smarty.get.idTim});'>
                        <option value="">Još niste ocjenili ovaj tim...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </section>
                
            </article>
                <article>
                    <h1>AV materijali tima</h1>
                    
                    <h2>Slike</h2>
                    <section id="slike">
                        
                    </section>
                    
                    {if $smarty.session.tip_korisnika eq 3 or $smarty.session.tip_korisnika eq 2}
                        <form class="upload" method = "post" action="timovi.php?idTim={$smarty.get.idTim}" enctype="multipart/form-data">
                            <label for="uploadPic">Postavi sliku</label>
                            <input type="file" name="uploadPic" id = "uploadPic">
                            <input type="submit" value="Upload slika">
                        </form>
                    {/if}

                    <h2>Video</h2>
                    <section id = "video">
                        
                    </section>
                    
                    {if $smarty.session.tip_korisnika eq 3 or $smarty.session.tip_korisnika eq 2}
                        <form class="upload" method = "post" action="timovi.php?idTim={$smarty.get.idTim}" enctype="multipart/form-data">
                            <label for="uploadVid">Postavi video</label>
                            <input type="file" name="uploadVid" id = "uploadVid">
                            <input type="submit" value="Upload video">
                        </form>
                    {/if}
                    
                    <h2>Dokumenti</h2>
                    <section id = "doc">
                        
                    </section>
                    
                    {if $smarty.session.tip_korisnika eq 3 or $smarty.session.tip_korisnika eq 2}
                        <form class="upload" method = "post" action="timovi.php?idTim={$smarty.get.idTim}" enctype="multipart/form-data">
                            <label for="uploadDoc">Postavi dokument</label>
                            <input type="file" name="uploadDoc" id = "uploadDoc">
                            <input type="submit" value="Upload dokument">
                        </form>
                    {/if}
                    
                </article>
                    
                    <article style='background-color: #33ffcc'>
                        <h2>Komentari</h2>
                        <section id = "commentSection">
                            
                        </section>
                        <form class="category" method = "post" action="timovi.php?idTim={$smarty.get.idTim}">
                            <label for='komentar'>Vaš komentar:</label>
                            <textarea name = 'textkomentar' id='komentar' cols=50></textarea>
                            <input type='submit' name='komentar' value='Komentiraj!'/>
                        </form>
                    </article>
        </section>