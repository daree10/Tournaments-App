<?php

class UploadSlike {
    private $target_dir;
    private $target_file;
    private $imageFileType;
    private $slika_vel;
    private $slika_file;
    private $errMessage;
    
    function __construct($korime,$target_dir, $slika_ime, $slika_vel, $slika_file) {
        $this->target_dir = $target_dir;
        $this->target_file = $target_dir . $korime . substr(basename($slika_ime), -4);
                
        $this->imageFileType = pathinfo($this->target_file, PATHINFO_EXTENSION);
        
        $this->slika_vel = $slika_vel;
        $this->slika_file = $slika_file;
    }
    
    function uploadImg()
    {
        $uploadOk = 1;
        $greska = "";
        if ($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif" && $this->imageFileType != "PNG"
                && $this->imageFileType != "JPG" 
                && $this->imageFileType != "GIF" 
                && $this->imageFileType != "JPEG") {
            $greska .= "Uploadirani file nije slika! Provjerite da je uploadirani file tipa jpg, png, jpeg ili gif...<br>";
            $uploadOk = 0;
        }
        if ($this->slika_vel > 8000000) {
            $greska .= "Uploadirani file je prevelik!<br>";
            $uploadOk = 0;
        }
        if ($uploadOk != 0) {
            move_uploaded_file($this->slika_file, $this->target_file);
            return $uploadOk;
        }
        else
        {
            $this->errMessage = $greska;
            return $uploadOk;
        }
    }
    
    function uploadVid()
    {
        $uploadOk = 1;
        $greska = "";
        if ($this->imageFileType != "mp4" && $this->imageFileType != "ogg") {
            $greska .= "Uploadirani file nije video! Provjerite da je uploadirani file tipa mp4,avi ili ogg...<br>";
            $uploadOk = 0;
        }
        if ($this->slika_vel > 8000000) {
            $greska .= "Uploadirani file je prevelik!<br>";
            $uploadOk = 0;
        }
        if ($uploadOk != 0) {
            move_uploaded_file($this->slika_file, $this->target_file);
            return $uploadOk;
        }
        else
        {
            $this->errMessage = $greska;
            return $uploadOk;
        }
    }
    
    function uploadDoc()
    {
        $uploadOk = 1;
        $greska = "";
        if ($this->slika_vel > 8000000) {
            $greska .= "Uploadirani file je prevelik!<br>";
            $uploadOk = 0;
        }
        if ($uploadOk != 0) {
            move_uploaded_file($this->slika_file, $this->target_file);
            return $uploadOk;
        }
        else
        {
            $this->errMessage = $greska;
            return $uploadOk;
        }
    }
    
    function getErrorMessage()
    {
        return $this->errMessage;
    }
    
    function getPath()
    {
        return $this->target_file;
    }
}
?>