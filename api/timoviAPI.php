<?php

include_once '../baza.class.php';
$baza = new Baza();

$idKor = $_POST["idUser"];
$idTip = $_POST["userType"];

if (!isset($_POST["idTeam"])) {
    $sql = "SELECT id,nazivtima,opistima FROM tim WHERE $idTip = 3 OR $idTip = 2 OR "
            . "$idTip = 1 AND turnir_id IN (SELECT turnir_id FROM tim WHERE vrijeme_pristupa_turniru IS NOT NULL AND korisnik_predstavnik_id = $idKor);";
    $rezultat = $baza->selectDB($sql);

    $korisnici = array();
    while ($red = $rezultat->fetch_object()) {
        $korisnik = array("id" => $red->id);
        $korisnik["nazivtima"] = $red->nazivtima;
        $korisnik["opistima"] = $red->opistima;

        array_push($korisnici, $korisnik);
    }
} else {
    $idTim = $_POST["idTeam"];
    $sql = "SELECT tim.id,nazivtima,opistima,korime,ime,prezime,turnir.naziv as nazivturnira FROM turnir JOIN tim ON(turnir_id = turnir.id) JOIN korisnik ON(korisnik_predstavnik_id = korisnik.id) WHERE tim.id =$idTim;";
    $rezultat = $baza->selectDB($sql);

    $korisnici = array();
    while ($red = $rezultat->fetch_object()) {
        $korisnik = array("id" => $red->id);
        $korisnik["nazivtima"] = $red->nazivtima;
        $korisnik["opistima"] = $red->opistima;
        $korisnik["korime"] = $red->korime;
        $korisnik["ime"] = $red->ime;
        $korisnik["prezime"] = $red->prezime;
        $korisnik["nazivturnira"] = $red->nazivturnira;
        array_push($korisnici, $korisnik);
    }
}
echo json_encode($korisnici);
?>
