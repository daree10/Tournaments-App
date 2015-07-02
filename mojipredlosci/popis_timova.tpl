                    <script>
                        $.ajax({
                                url: "http://arka.foi.hr/WebDiP/2014_projekti/WebDiP2014x070/api/timoviAPI.php",
                                context: document.body,
                                dataType: "json",
                                type: "POST",
                                data:
                                        {
                                            idUser: {$smarty.session.id_kor},
                                            userType: {$smarty.session.tip_korisnika}
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
                