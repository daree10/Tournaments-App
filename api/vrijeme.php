<?php

function formatTime($time = "") {
    $vrijeme = new DateTime($time);
    $dan = $vrijeme->format("d");
    switch ($vrijeme->format("m")) {
        case 1:
            $mjesec = "siječnja";
            break;
        case 2:
            $mjesec = "veljače";
            break;
        case 3:
            $mjesec = "ožujka";
            break;
        case 4:
            $mjesec = "travnja";
            break;
        case 5:
            $mjesec = "svibnja";
            break;
        case 6:
            $mjesec = "lipnja";
            break;
        case 7:
            $mjesec = "srpnja";
            break;
        case 8:
            $mjesec = "kolovoza";
            break;
        case 9:
            $mjesec = "rujna";
            break;
        case 10:
            $mjesec = "listopada";
            break;
        case 11:
            $mjesec = "studenog";
            break;
        case 12:
            $mjesec = "prosinca";
            break;
    }
    $godina = $vrijeme->format("Y");
    switch (substr($vrijeme->format("l"), 0, 3)) {
        case "Mon":
            $dantj = "Ponedjeljak";
            break;
        case "Tue":
            $dantj = "Utorak";
            break;
        case "Wed":
            $dantj = "Srijedu";
            break;
        case "Thu":
            $dantj = "Četvrtak";
            break;
        case "Fri":
            $dantj = "Petak";
            break;
        case "Sat":
            $dantj = "Subotu";
            break;
        case "Sun":
            $dantj = "Nedjelju";
            break;
    }
    return $vrijeme->format('H:i:s') . " u " . $dantj . ", " . $dan . "." . $mjesec . " " . $godina;
}
function getVrijeme()
{
    include_once 'baza.class.php';
    $baza = new Baza();
    
    $rezultat=$baza->selectDB("SELECT time_offset FROM virtual_time;");
    
    $currTime = new DateTime();
    $currTime->modify($rezultat->fetch_object()->time_offset." hours");
    
    return $currTime;
}
?>