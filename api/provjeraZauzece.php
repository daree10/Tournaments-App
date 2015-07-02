<?php

include_once '../baza.class.php';
if (isset($_GET["fieldName"])) {
    if (isset($_GET["fieldVal"])) {
        $baza = new Baza();
        $fieldVal = $_GET["fieldVal"];
        $fieldName = $_GET["fieldName"];
        if ($_GET["fieldName"] == "korime") {
            $upit = "SELECT * FROM korisnik WHERE korime = '$fieldVal'";
        } else {
            $upit = "SELECT * FROM korisnik WHERE email = '$fieldVal'";
        }
        $rezultat = $baza->selectDB($upit);
        if ($rezultat->num_rows != 0) {

            $arr = array($fieldName => $fieldVal);
        } else {

            $arr = array($fieldName => 0);
        }
        echo json_encode($arr);
    }
}
?>

