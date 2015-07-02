<?php
include_once '../baza.class.php';
    $baza = new Baza();
    $upit = "SELECT id,korime,ime,prezime,email,lozinka,grad,zupanija,datum_rodjenja,spol,datum_registracije,datum_zadnjeg_pristupa,tip_korisnika_id,aktivacijski_kod,status_korisnika_id,url_slika FROM korisnik";
    if(!empty($_POST["fieldName"]))
    {
        if(!empty($_POST["fieldVal"]))
        {  
            $fieldName = $_POST["fieldName"];
            $fieldVal = $_POST["fieldVal"];
            $upit .= " WHERE $fieldName = '$fieldVal'";
        }
    }
    
    if(!empty($_POST["orderBy"]))
    {
        $orderBy = $_POST["orderBy"];
        $upit .= " ORDER BY $orderBy";
    }
    else if(!empty($_POST["lookBy"]))
        {
            $lookBy = $_POST["lookBy"];
            $upit .= " WHERE korime LIKE '%$lookBy%' OR ime LIKE '%$lookBy%' OR prezime LIKE '%$lookBy%' OR email LIKE '%$lookBy%'";
        }
    
    
       
    $upit .= ";";
    $rezultat = $baza->selectDB($upit);
    
    $korisnici = array();
    while($red = $rezultat->fetch_object())
    {
        $korisnik = array("id"=>$red->id);
        $korisnik["korime"] = $red->korime;
        $korisnik["ime"] = $red->ime;
        $korisnik["prezime"] = $red->prezime;
        $korisnik["email"] = $red->email;
        $korisnik["lozinka"] = $red->lozinka;
        $korisnik["grad"] = $red->grad;
        $korisnik["zupanija"] = $red->zupanija;
        $korisnik["datum_rodjenja"] = $red->datum_rodjenja;
        $korisnik["spol"] = $red->spol;
        $korisnik["datum_registracije"] = $red->datum_registracije;
        $korisnik["datum_zadnjeg_pristupa"] = $red->datum_zadnjeg_pristupa;
        $korisnik["tip_korisnika_id"] = $red->tip_korisnika_id;
        $korisnik["aktivacijski_kod"] = $red->aktivacijski_kod;
        $korisnik["status_korisnika_id"] = $red->status_korisnika_id;
        $korisnik["url_slika"] = $red->url_slika;
        
        array_push($korisnici, $korisnik);
    }
    echo json_encode($korisnici);
?>

