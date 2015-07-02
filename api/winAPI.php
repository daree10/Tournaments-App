<?php

    include_once '../baza.class.php';
    $baza = new Baza();

    $idTeam = $_POST["idTeam"];
    $idTournament = $_POST["idTournament"];
    
    $sql = "UPDATE turnir SET tim_pobjednik_id = $idTeam WHERE id = $idTournament;";
    
    $baza->updateDB($sql);
    
    $upit = "SELECT korisnik.email as recipient, turnir.naziv as nazivturnira,(SELECT nazivtima FROM tim WHERE id = $idTeam) as pobjednik FROM korisnik JOIN tim ON(tim.korisnik_predstavnik_id=korisnik.id) JOIN turnir ON(turnir.id = turnir_id) WHERE turnir_id =$idTournament;";
    
    $rezultat = $baza->selectDB($upit);
    while($red = $rezultat->fetch_object())
    {
        mail($red->recipient, 'Turnir gotov', "Poštovani, pobjednik turnira ".$red->nazivturnira.". je ".$red->pobjednik);
    }
    
    echo json_encode(array("status" => "true"));
?>

