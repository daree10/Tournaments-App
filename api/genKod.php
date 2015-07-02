<?php

function generiranjeAktivacijskogKoda($len) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789_";
    $poljeCharova = str_split($chars);
    $aktivacijski_kod = "";
    for ($i = 0; $i < $len; $i++) {
        $randItem = array_rand($poljeCharova);
        $aktivacijski_kod .= "" . $poljeCharova[$randItem];
    }

    return $aktivacijski_kod;
}
?>
