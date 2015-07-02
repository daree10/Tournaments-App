<?php

include_once '../baza.class.php';
$baza = new Baza();

if (isset($_POST["tableName"])) {
    $table = $_POST["tableName"];
    switch ($table) {
        case "kategorija":
            $upit = "SELECT id,naziv FROM kategorija";
            break;
        case "turniri":
            if(!empty($_POST["idKatTurnir"])){
                $upit = "SELECT id,naziv,pravila,maxnatjecatelja,datum_pocetka FROM turnir WHERE tim_pobjednik_id IS NULL AND kategorija_id = ".$_POST["idKatTurnir"];
            }
            else
            {
                $upit = "SELECT id,naziv,pravila,maxnatjecatelja,datum_pocetka FROM turnir WHERE tim_pobjednik_id IS NULL";
            }
            break;
    }

    if (!empty($_POST["fieldNaziv"])) {
        $naziv = $_POST["fieldNaziv"];
        $upit .= " WHERE naziv LIKE '%$naziv%'";
    }

    $upit .= ";";
    $rezultat = $baza->selectDB($upit);

    $rezJSON = array();
    switch ($table) {
        case "kategorija":
            while ($red = $rezultat->fetch_object()) {
                $kat = array("id" => $red->id);
                $kat["naziv"] = $red->naziv;

                array_push($rezJSON, $kat);
            }
            break;
        case "turniri":
            while ($red = $rezultat->fetch_object()) {
                $kat = array("id" => $red->id);
                $kat["naziv"] = $red->naziv;
                $kat["pravila"] = $red->pravila;
                $kat["maxnatjecatelja"] = $red->maxnatjecatelja;
                $kat["datum_pocetka"] = $red->datum_pocetka;

                array_push($rezJSON, $kat);
            }
            if(count($rezJSON) == 0)
            {
                array_push($rezJSON, array("id"=>0));
            }
            break;
    }    
    echo json_encode($rezJSON);
}

else if (isset($_POST["idKategorija"]))
{
    $idKat = $_POST["idKategorija"];
    $upit = "SELECT id,korime,url_slika "
            . "FROM korisnik "
            . "WHERE "
            . "id IN (SELECT korisnik_moderator_id FROM mod_kategorija WHERE kategorija_id = $idKat);";
    $rezultat = $baza->selectDB($upit);
    $rezJSON = array();
    while ($red = $rezultat->fetch_object()) {
                $kor["id"] = $red->id;
                $kor["korime"] = $red->korime;
                $kor["url_slika"] = $red->url_slika;
//                $kor["ime"] = $red->ime;
//                $kor["prezime"] = $red->prezime;
//                $kor["email"] = $red->email;
                array_push($rezJSON, $kor);
            }
    if(count($rezJSON) == 0)
    {
        $kor["id"] = 0;
        array_push($rezJSON,$kor);
    }
    echo json_encode($rezJSON); 
}

else if (isset($_POST["idKor"]))
{
    $idKor = $_POST["idKor"];
    
    $upit = "SELECT id,naziv FROM kategorija WHERE id NOT IN (SELECT kategorija_id FROM mod_kategorija WHERE korisnik_moderator_id = $idKor)";
    if(!empty($_POST["field"]))
    {
        $upit = "SELECT id,naziv FROM kategorija WHERE id IN (SELECT kategorija_id FROM mod_kategorija WHERE korisnik_moderator_id = $idKor)";
    }
    
    $rezultat = $baza->selectDB($upit);
    $rezJSON = array();
    while ($red = $rezultat->fetch_object()) {
                $kor["id"] = $red->id;
                $kor["naziv"] = $red->naziv;
                array_push($rezJSON, $kor);
            }
    if(count($rezJSON) == 0)
    {
        $kor["id"] = 0;
        array_push($rezJSON,$kor);
    }
    echo json_encode($rezJSON);
}
?>

