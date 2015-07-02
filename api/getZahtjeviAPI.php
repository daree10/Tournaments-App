<?php

$rt = $_POST["requestType"];
$id = $_POST["userID"];

$upit = "SELECT tim.id as idtim,tim.nazivtima as nazivtim,tim.opistima as opistim,korisnik.korime as predstavnik,tim.razlog_odbacivanja as razlog,turnir.naziv as turnirnaziv FROM tim join korisnik on(tim.korisnik_predstavnik_id = korisnik.id) join turnir where tim.turnir_id = turnir.id AND turnir.korisnik_moderator_id = $id";

switch ($rt) {
    case "odbijeni":
        $upit .= " AND tim.razlog_odbacivanja IS NOT NULL";
        break;
    case "prihvaceni":
        $upit .= " AND tim.vrijeme_pristupa_turniru IS NOT NULL";
        break;
    case "novi":
        $upit .= " AND tim.razlog_odbacivanja IS NULL AND tim.vrijeme_pristupa_turniru IS NULL";
        break;
}

$upit .= ";";
include_once '../baza.class.php';

$baza = new Baza();
$rezultat = $baza->updateDB($upit);

$rezJSON = array();
while ($red = $rezultat->fetch_object()) {
    $tim = array("id" => $red->idtim);
    $tim["nazivtima"] = $red->nazivtim;
    $tim["opistima"] = $red->opistim;
    $tim["predstavnik"] = $red->predstavnik;
    $tim["razlogodb"] = $red->razlog;
    $tim["turnirnaziv"] = $red->turnirnaziv;
    array_push($rezJSON, $tim);
}
echo json_encode($rezJSON);
?>

