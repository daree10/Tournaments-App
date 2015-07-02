<?php
    include_once '../baza.class.php';
    $baza = new Baza();
    
    if(isset($_POST["categoryName"]))
    {
        $category = $_POST["categoryName"];
        $upitINSERT = "INSERT INTO kategorija(naziv) VALUES ('$category');";
        
        $baza->updateDB($upitINSERT);      
    }
    else if (isset($_POST["categoryIdDelete"]))
    {
        $categoryID = $_POST["categoryIdDelete"];
        $upitDELETE = "DELETE FROM kategorija WHERE id = $categoryID;";
        ob_start();
        $rezJSON = array();
        if($baza->updateDB($upitDELETE))
        {
            $rezJSON["odg"] = "true";
        }
        else
        {
            $rezJSON["odg"] = "false";
        }
        ob_end_clean();
        echo json_encode($rezJSON);
    }
    else if (isset($_POST["idKategorija"]) && isset($_POST["idMod"]))
    {
        $kat = $_POST["idKategorija"];
        $kor = $_POST["idMod"];
        $upit = "DELETE FROM mod_kategorija WHERE korisnik_moderator_id = $kor AND kategorija_id = $kat;";
        
        $baza->updateDB($upit);
        
        $upit2 = "SELECT * FROM korisnik WHERE id = $kor AND tip_korisnika_id = (SELECT id FROM tip_korisnika WHERE naziv = 'administrator') OR EXISTS(SELECT * FROM mod_kategorija WHERE korisnik_moderator_id = $kor);";
        $rezultat = $baza->selectDB($upit2);
        if($rezultat->num_rows == 0)
        {
            $sql = "UPDATE korisnik SET tip_korisnika_id = (SELECT id FROM tip_korisnika WHERE naziv = 'registrirani') WHERE id = $kor;";
            $baza->updateDB($sql);
        }
        
        echo json_encode(array("id"=>$upit2));
    }
?>

