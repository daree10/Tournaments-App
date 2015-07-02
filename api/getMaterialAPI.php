<?php

function isMultimedia($matType) {
    switch ($matType) {
        case 1:
        case 2:
        case 3: return true;
        default: return false;
    }
}

if (isset($_POST["idTeam"]) && isset($_POST["materialType"]) && isMultimedia($_POST["materialType"])) {
    $materialType = $_POST["materialType"];
    $idTeam = $_POST["idTeam"];
    $sql = "";
    switch ($materialType) {
        case "1":
            $sql = "SELECT id,url FROM video WHERE tim_id = $idTeam";
            break;
        case "2":
            $sql = "SELECT id,url FROM slika WHERE tim_id = $idTeam";
            break;
        case "3":
            $sql = "SELECT id,url FROM dokument WHERE tim_id = $idTeam";
            break;
    }

    include_once '../baza.class.php';
    $baza = new Baza();

    $rezultat = $baza->selectDB($sql);
    $rezJSON = array();
    while ($red = $rezultat->fetch_object()) {
        $material = array("id" => $red->id);
        $material["url"] = $red->url;
        array_push($rezJSON, $material);
    }
    if (count($rezJSON) == 0) {
        $rezJSON = array("url" => "null");
    }
    echo json_encode($rezJSON);
} else if (isset($_POST["idTeam"]) && isset($_POST["materialType"]) && !isMultimedia(($_POST["materialType"]))) {
    $sql = "SELECT komentar,korime,vrijeme FROM komentar JOIN korisnik ON(korisnik_od_id = korisnik.id) WHERE tim_id = " . $_POST["idTeam"] . " ORDER BY vrijeme DESC;";
    include_once '../baza.class.php';
    
    include_once 'vrijeme.php';
    $baza = new Baza();

    $rezultat = $baza->selectDB($sql);
    $rezJSON = array();
    while ($red = $rezultat->fetch_object()) {
        $material = array("komentar" => $red->komentar);
        $material["korime"] = $red->korime;
        $material["vrijeme"] = formatTime($red->vrijeme);
        array_push($rezJSON, $material);
    }
    if (count($rezJSON) == 0) {
        $rezJSON = array("url" => "null");
    }
    echo json_encode($rezJSON);
}
?>

