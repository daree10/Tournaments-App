<?php

include_once '../baza.class.php';
$baza = new Baza();
$rating = $_POST["rating"];
$idTim = $_POST["idTeam"];
$idUser = $_POST["idUser"];

if($rating != "")
{
$sequel = "INSERT INTO ocjena(korisnik_poslao_id,tim_za_id,rating) VALUES($idUser,$idTim,$rating) ON DUPLICATE KEY UPDATE rating = $rating;";

$baza->updateDB($sequel);
}
$rezJSON = array();
$sequel2 = "SELECT COALESCE(AVG(rating),'Tim nije ocjenjen') as aver, COALESCE((SELECT rating FROM ocjena WHERE korisnik_poslao_id = $idUser AND tim_za_id = $idTim),'') as userRating FROM ocjena WHERE tim_za_id = $idTim;";
$red = $baza->selectDB($sequel2)->fetch_object();
$rezJSON["averageRating"] = $red->aver;
$rezJSON["selectedRating"] = $red->userRating;
echo json_encode($rezJSON);
?>

