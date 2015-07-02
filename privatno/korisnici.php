<?php
include_once '../baza.class.php';

$baza = new Baza();
$upit = "SELECT korime,ime,prezime,lozinka,tip_korisnika_id FROM korisnik";

$rezultat = $baza->selectDB($upit);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Korisnici i lozinke</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Darijan Vertovšek"/>
        <meta name="dcterms.created" content = "2015-03-11"/> 
        <link rel="stylesheet" type="text/css" href="../css/dvertovs.css"/>
    </head
    <body>
        <header id="zaglavlje">
            <h1>Korisnici i lozinke</h1> 
            
        </header>
        
        <section id="sadrzaj">
            <table>
                <thead>
                <th>
                    Ime
                </th>
                <th>
                    Prezime
                </th>
                <th>
                    Korisničko ime
                </th>
                <th>
                    Lozinka
                </th>
                <th>
                    Tip korisnika
                </th>
                </thead>
                <tbody>
                    <?php
                    while($red = $rezultat->fetch_object()){
                    echo "<tr>";
                    echo "<td>";
                    echo $red->ime;        
                    echo "</td>";
                    echo "<td>";
                            echo $red->prezime; 
                    echo "</td>";
                    echo "<td>";
                            echo $red->korime; 
                    echo "</td>";
                    echo "<td>";
                            echo $red->lozinka; 
                    echo "</td>";
                    echo "<td>";
                    switch($red->tip_korisnika_id){
                            case 1:
                                echo "Obični korisnik";
                                break;
                            case 2:
                                echo "Moderator";
                                break;
                            case 3:
                                echo "Administrator";
                                break;
                    }
                    echo "</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
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
            <div>Web aplikacija Turniri</div>
            <div>Sva prava pridržana (C) 1999 - <?php echo date("Y"); ?></div>
        </footer>
    </body>
</html>
