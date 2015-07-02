<?php

include_once '../baza.class.php';
$baza = new Baza();

if (isset($_POST["fieldName"]) && isset($_POST["fieldVal"]) && isset($_POST["idTurnir"])) {
    $fieldName = $_POST["fieldName"];
    $fieldVal = $_POST["fieldVal"];
    $idTurnir = $_POST["idTurnir"];
    ob_start();
    $ok = true;
    if ($fieldName == "naziv") {
        $upit = "SELECT * FROM turnir WHERE naziv = '$fieldVal';";
        $rezultat = $baza->selectDB($upit);
        if ($rezultat->num_rows != 0) {
            $sql = "SELECT naziv FROM turnir WHERE id = $idTurnir;";
            $rez = $baza->selectDB($sql);
            $red = $rez->fetch_object();
            $output = array("uspjeh" => "Naziv već postoji.","naziv"=>$red->naziv);
            $ok = false;
        }
    }

    if ($fieldName == "maxnatjecatelja") {

        if ($fieldVal <= 0) {
            $output = array("uspjeh" => "Maksimalni broj natjecatelja ne može biti 0 ili manji od nule.","naziv"=>"");
            $ok = false;
        }
    }
    if ($ok) {
        $sql = "UPDATE turnir SET $fieldName = '$fieldVal' WHERE id = $idTurnir";

        $baza->updateDB($sql);

        $output = array("uspjeh" => "true","naziv"=>"");
    }
    ob_end_clean();
    echo json_encode($output);
}
?>

