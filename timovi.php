<?php

session_start();
include_once 'limit_access.php';
login_only();

if (isset($_GET["idTim"])) {
    include_once './baza.class.php';
    $baza = new Baza();
    $idTim = $_GET["idTim"];
    $idUser = $_SESSION["id_kor"];
    if (isset($_POST["izmjena"])) {
        $naziv = $_POST["nazivtima"];
        $opis = $_POST["opistima"];
        $sql = "UPDATE tim SET nazivtima = '$naziv',opistima = '$opis' WHERE id = $idTim;";
        $baza->updateDB($sql);
    }

    if (!empty($_FILES["uploadPic"]["name"])) {
        include_once 'uploadSlike.class.php';
        include_once 'api/genKod.php';
        $kod = generiranjeAktivacijskogKoda(20);
        $uploadSlike = new UploadSlike("usrpic_slikatim$kod", 'material/img/', $_FILES["uploadPic"]["name"], $_FILES["uploadPic"]["size"], $_FILES["uploadPic"]["tmp_name"]);
        if ($uploadSlike->uploadImg() != 0) {
            $imgUrl = $uploadSlike->getPath();
            $sql = "INSERT INTO slika(url,tim_id,korisnik_moderator__postavio_id) VALUES('$imgUrl',$idTim,'" . $_SESSION["id_kor"] . "');";
            $baza->updateDB($sql);
        }
    }

    if (!empty($_FILES["uploadVid"]["name"])) {
        include_once 'uploadSlike.class.php';
        include_once 'api/genKod.php';
        $kod = generiranjeAktivacijskogKoda(20);
        $uploadVideo = new UploadSlike("usr_vidtim$kod", 'material/vid/', $_FILES["uploadVid"]["name"], $_FILES["uploadVid"]["size"], $_FILES["uploadVid"]["tmp_name"]);
        if ($uploadVideo->uploadVid() != 0) {
            $imgUrl = $uploadVideo->getPath();
            $sql = "INSERT INTO video(url,tim_id,korisnik_moderator_postavio_id) VALUES('$imgUrl',$idTim," . $_SESSION["id_kor"] . ");";
            $baza->updateDB($sql);
        }
    }

    if (!empty($_FILES["uploadDoc"]["name"])) {
        include_once 'uploadSlike.class.php';
        include_once 'api/genKod.php';
        $kod = generiranjeAktivacijskogKoda(20);
        $uploadDoc = new UploadSlike("usr_doctim$kod", 'material/doc/', $_FILES["uploadDoc"]["name"], $_FILES["uploadDoc"]["size"], $_FILES["uploadDoc"]["tmp_name"]);
        if ($uploadDoc->uploadDoc() != 0) {
            $imgUrl = $uploadDoc->getPath();
            $sql = "INSERT INTO dokument(url,tim_id,korisnik_moderator_postavio_id) VALUES('$imgUrl',$idTim," . $_SESSION["id_kor"] . ");";
            $baza->updateDB($sql);
        }
    }

    if (!empty($_POST["komentar"])) {
        $textKomentar = $_POST["textkomentar"];
        include_once 'api/vrijeme.php';
        $vrijeme = getVrijeme()->format('Y-m-d H:i:s');
        $sql = "INSERT INTO komentar(vrijeme,komentar,tim_id,korisnik_od_id) VALUES('$vrijeme','$textKomentar',$idTim,$idUser);";
        $baza->updateDB($sql);
        
    }

    $sql = "SELECT * FROM korisnik WHERE 
            (SELECT turnir_id FROM tim WHERE id = $idTim) IN 
            (SELECT turnir_id FROM tim
            WHERE tim.korisnik_predstavnik_id = $idUser AND tim.vrijeme_pristupa_turniru IS NOT NULL
                )
                OR
                (SELECT korisnik_moderator_id FROM turnir JOIN tim ON(turnir.id = tim.turnir_id) WHERE tim.id = $idTim) = $idUser;";




    if ($baza->selectDB($sql)->num_rows == 0 && $_SESSION["tip_korisnika"] != 3) {
        header("Location: turniri_reg.php");
    }

    require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
    $smarty = new Smarty();

    $upit = "SELECT nazivtima,opistima,korisnik.korime as korime,korisnik.ime as ime,korisnik.prezime as prezime,turnir.naziv as nazivturnira FROM tim JOIN korisnik ON(korisnik.id = korisnik_predstavnik_id) JOIN turnir ON (turnir_id = turnir.id) WHERE tim.id = $idTim;";

    $rezultat = $baza->selectDB($upit);
    $red = $rezultat->fetch_object();

    $smarty->assign('nazivtima', $red->nazivtima);
    $smarty->assign('opistima', $red->opistima);
    $smarty->assign('korime', $red->korime);
    $smarty->assign('ime', $red->ime);
    $smarty->assign('prezime', $red->prezime);
    $smarty->assign('nazivturnira', $red->nazivturnira);

    $smarty->assign('title', 'Profil tima');

    $smarty->display('mojipredlosci/_header.tpl');
    $smarty->display('mojipredlosci/_navig.tpl');
    $smarty->display('mojipredlosci/timovi.tpl');
    $smarty->display('mojipredlosci/_footer.tpl');
}
?>

