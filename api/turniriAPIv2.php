<?php

include_once '../baza.class.php';

if (isset($_POST["idKategorija"]) && isset($_POST["idMod"])) {

    $baza = new Baza();
    $kat = $_POST["idKategorija"];
    $mod = $_POST["idMod"];

    $upit = "SELECT turnir.id,naziv,pravila,maxnatjecatelja,tim.nazivtima as nazivtima,datum_pocetka FROM turnir LEFT JOIN tim ON(tim_pobjednik_id = tim.id) WHERE kategorija_id = $kat AND korisnik_moderator_id = $mod;";

    $rezultat = $baza->selectDB($upit);

    $rezJSON = array();
    while ($red = $rezultat->fetch_object()) {
        $tur = array("naziv" => $red->naziv);
        $tur["id"] = $red->id;
        $tur["pravila"] = $red->pravila;
        $tur["maxnatjecatelja"] = $red->maxnatjecatelja;
        $tur["tim_pobjednik_id"] = $red->nazivtima;
        $tur["datum_pocetka"] = $red->datum_pocetka;

        array_push($rezJSON, $tur);
    }
    if(count($rezJSON) == 0)
    {
        $kor["id"] = 0;
        array_push($rezJSON,$kor);
    }
    echo json_encode($rezJSON); 
}
if (isset($_POST["idTournament"]) && isset($_POST["active"])) {
    $baza = new Baza();
    $idTurnir = $_POST["idTournament"];

    $upit = "SELECT id,nazivtima,opistima,korisnik_predstavnik_id,vrijeme_pristupa_turniru,razlog_odbacivanja FROM tim WHERE turnir_id = $idTurnir";

    switch ($_POST["active"]) {
        case "true":
            $upit .= " AND vrijeme_pristupa_turniru IS NOT NULL";
            break;
        case "false":
            $upit .= " AND vrijeme_pristupa_turniru IS NULL";
        default:
    }

    $rezultat = $baza->selectDB($upit);
    if ($rezultat->num_rows != 0) {
        $rezJSON = array();
        while ($red = $rezultat->fetch_object()) {
            $tur = array("nazivtima" => $red->nazivtima);
            $tur["id"] = $red->id;
            $tur["opistima"] = $red->opistima;
            $tur["korisnik_predstavnik_id"] = $red->korisnik_predstavnik_id;
            $tur["vrijeme_pristupa_turniru"] = $red->vrijeme_pristupa_turniru;
            $tur["razlog_odbacivanja"] = $red->razlog_odbacivanja;

            array_push($rezJSON, $tur);
        }
        echo json_encode($rezJSON);
    } else {
        echo json_encode(array(array("id" => 0)));
    }
}
?>

