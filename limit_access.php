<?php

session_start();

function admin_only() {
    if ($_SESSION["tip_korisnika"] != 3) {
        header("Location: index.php");
    }
}

function mod_only() {
    if (!($_SESSION["tip_korisnika"] == 2 || $_SESSION["tip_korisnika"] == 3)) {
        header("Location: index.php");
    }
}

function login_only() {
    if (!isset($_SESSION["id_kor"])) {
        header("Location: prijava.php");
    }
}

?>
