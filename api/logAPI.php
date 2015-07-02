<?php

include_once '../baza.class.php';
$baza = new Baza();
$sql = "";
if (empty($_POST["graph"])) {
    $sql = "SELECT korisnik.id,korisnik.korime,zapisnik.vrijeme,tip_zahtjeva.naziv,tip_zahtjeva.opis FROM korisnik JOIN zapisnik ON(korisnik.id = zapisnik.korisnik_id) JOIN tip_zahtjeva ON(tip_zahtjeva.id = tip_zahtjeva_id)";
    if (!empty($_POST["dateFrom"]) && empty($_POST["dateTo"])) {
        $vrijemeOd = $_POST["dateFrom"];
        $sql .= " WHERE vrijeme>'$vrijemeOd'";
    }
    if (empty($_POST["dateFrom"]) && !empty($_POST["dateTo"])) {
        $vrijemeDo = $_POST["dateTo"];
        $sql .= " WHERE vrijeme<'$vrijemeDo'";
    }
    if(!empty($_POST["dateFrom"]) && !empty($_POST["dateTo"])) {
        $vrijemeOd = $_POST["dateFrom"];
        $vrijemeDo = $_POST["dateTo"];
        $sql .= " WHERE vrijeme BETWEEN '$vrijemeOd' AND '$vrijemeDo'";
    }
    $sql .= ";";
    $rezJSON = array();

    $rezultat = $baza->selectDB($sql);
    while ($red = $rezultat->fetch_object()) {
        if(!empty($_POST["userID"]))
        {
            if($red->id != $_POST["userID"])
            {
                continue;
            }
        }
        $redRez = array("id_kor" => $red->id);
        $redRez["korime"] = $red->korime;
        $redRez["vrijeme"] = $red->vrijeme;
        $redRez["tipzahtjev"] = $red->naziv;
        $redRez["opiszahtjev"] = $red->opis;
        array_push($rezJSON, $redRez);
    }
} else {
    $korisnikUpit = "";
    if(empty($_POST["userID"]))
    {
        $korisnikUpit .= " AND korisnik_id IS NOT NULL";
    }
    else
    {
        $korisnikUpit .= " AND korisnik_id =".$_POST["userID"];
    }
    $sql = "SELECT (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 1 $korisnikUpit) as br_uspjesna, (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 2 $korisnikUpit) as br_neuspjesna;";
    if (!empty($_POST["dateFrom"]) && empty($_POST["dateTo"])) {
        $vrijemeOd = $_POST["dateFrom"];
        $sql = "SELECT (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 1 AND vrijeme>'$vrijemeOd' $korisnikUpit) as br_uspjesna, (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 2 AND vrijeme>'$vrijemeOd' $korisnikUpit) as br_neuspjesna;";
    }
    if (empty($_POST["dateFrom"]) && !empty($_POST["dateTo"])) {
        $vrijemeDo = $_POST["dateTo"];
        $sql = "SELECT (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 1 AND vrijeme<'$vrijemeDo' $korisnikUpit) as br_uspjesna, (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 2 AND vrijeme<'$vrijemeDo' $korisnikUpit) as br_neuspjesna;";
    }
    if(!empty($_POST["dateFrom"]) && !empty($_POST["dateTo"])) {
        $vrijemeOd = $_POST["dateFrom"];
        $vrijemeDo = $_POST["dateTo"];
        $sql = "SELECT (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 1 AND vrijeme BETWEEN '$vrijemeOd' AND '$vrijemeDo' $korisnikUpit) as br_uspjesna, (SELECT COUNT(*) FROM zapisnik WHERE tip_zahtjeva_id = 2 AND vrijeme BETWEEN '$vrijemeOd' AND '$vrijemeDo' $korisnikUpit) as br_neuspjesna;";
    }
    $rezultat = $baza->selectDB($sql)->fetch_object();
    $rezJSON = array("br_uspjesna"=>$rezultat->br_uspjesna);
    $rezJSON["br_neuspjesna"] = $rezultat->br_neuspjesna;
}
echo json_encode($rezJSON);
?>
